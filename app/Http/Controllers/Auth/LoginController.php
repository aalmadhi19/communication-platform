<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Settings;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Twilio\Rest\Voice\V1\DialingPermissions\SettingsList;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  // use AuthenticatesUsers;



  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|string',
      'password' => 'required|string',
    ]);
    $user = User::where('email', $request->email)->first();
    $settings = Settings::where('name', '2FA')->first();
    if ($user && Hash::check($request['password'], $user->password)) {

      if ($settings->status == '0') {
        Auth::login($user);
        return redirect()->route('home');
      }

      $token = getenv("TWILIO_AUTH_TOKEN");
      $twilio_sid = getenv("TWILIO_SID");
      $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
      $twilio = new Client($twilio_sid, $token);
      $twilio->verify->v2->services($twilio_verify_sid)
        ->verifications
        ->create('+966' . $user->phone, "sms");

      return redirect()->route('authentication')->with(['phone' => $user->phone, 'email' => $user->email]);
    } else {
      return back()->with(['error' => 'المعلومات المدخلة غير صحيحة!']);
    }
  }



  protected function verify(Request $request)
  {
    $request->session()->keep(['phone']);
    $request->session()->keep(['email']);

    $data = $request->validate([
      'code' => ['required', 'numeric', 'digits:4'],
      'phone' => ['required', 'string'],
      'email' => ['required'],
    ]);

    $token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_sid = getenv("TWILIO_SID");
    $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
    $twilio = new Client($twilio_sid, $token);
    $verification = $twilio->verify->v2->services($twilio_verify_sid)
      ->verificationChecks
      ->create($data['code'], array('to' => '+966' . $data['phone']));

    if ($verification->valid) {
      $user = User::where('email', $data['email'])->first();
      Auth::login($user);
      return redirect()->route('home');
    } else {
      return back()->with(['phone' => $data['phone'], 'email' => $data['email'], 'error' => 'رمز التحقق غير صحيح!']);
    }
  }


  public function logout(Request $request)
  {

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return $request->wantsJson()
      ? new JsonResponse([], 204)
      : redirect('/login');
  }
}

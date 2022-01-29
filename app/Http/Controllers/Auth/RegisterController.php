<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Settings;
use Modules\Student\Entities\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\FacultyMember\Entities\FacultyMember;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;
    use UploadFiles;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file', 'mimes:png,jpeg,jpg'],
            'email' => ['required', 'string', 'email', 'max:255', 'email', 'regex:/(.*)mu\.edu\.sa$/i', 'unique:users'],
            'phone' => ['required', 'phone_number', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request;
        $userMail = explode('@', $data['email']);
        if (isset($data['avatar'])) {
            $data['avatar'] =  $this->uploadFile($data['avatar'], 'avatar', 'avatars');
        } else {
            $data['avatar'] =  'default.jpeg';
        }

        if ($userMail[1] == 'mu.edu.sa') {
            $user_type = 'FacultyMember';
            $result = FacultyMember::facultyMemberCreate($data);
            $facultyMember = FacultyMember::where('email', $data['email'])->first();
            if ($facultyMember == false) {
                FacultyMember::store($result);
            }
        } elseif ($userMail[1] == 's.mu.edu.sa') {
            $user_type = 'Student';
            $result = Student::studentCreate($data);
            $student = Student::where('email', $data['email'])->first();
            if ($student == false) {
                Student::store($result);
            }
        }
        User::create([
            'name' => $data['name'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'user_type' => $user_type,
            'password' => Hash::make($data['password']),
        ]);
        $settings = Settings::where('name', '2FA')->first();
        if ($settings->status == '0') {

            return redirect('/login')->with(['success' => 'تم انشاء الحساب بنجاح.']);
        }

        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create('+966' . $data['phone'], "sms");

        return redirect()->route('authentication')->with(['phone' => $data['phone'], 'email' => $data['email']]);
    }
}

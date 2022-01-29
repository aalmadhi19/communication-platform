<?php

namespace App\Http\Controllers;

use Route;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserBaseController extends Controller
{


  public $isApiCall = false;

  public $requestSource = null;

  /**
  * will include array of controllers that generic middleware not run
  * @var array
  */
  private $exceptAuthorizeControllers = [

  ];

  /**
   * Create a New controller instance.
   *
   * @return void
   */
  public function __construct(Request $request)
  {
    Carbon::setLocale('ar');

    if ($request->call_type == "api") {

      $this->middleware('auth:api');
      $this->isApiCall = true;
      $this->requestSource = "app";

    } else {

      $this->requestSource = "web";
      $this->middleware('auth');
      $this->middleware('auth-user');
    }

  }






  /**
  * Check if current request Controller exist in except array
  * @return true if exist
  * @return false if not exist
  */
  public function isInExceptAuthorizeControllers()
  {
    if (in_array(Route::currentRouteAction(), $this->exceptAuthorizeControllers)) {
      return true;
    } else {
      return false;
    }
  }
}

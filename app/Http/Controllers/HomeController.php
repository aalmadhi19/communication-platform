<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserBaseController;

class HomeController extends UserBaseController
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $user_type = Auth::user()->user_type;
    switch ($user_type) {
      case 'FacultyMember';
        return redirect(route('faculty_member_home'));
        break;
      case 'Student';
        return redirect(route('student_home'));
        break;
      case 'Admin';
        return redirect(route('admin_home'));
        break;
      case 'Admin/FacultyMember';
        return redirect(route('faculty_member_home'));
        break;
    }
  }
}

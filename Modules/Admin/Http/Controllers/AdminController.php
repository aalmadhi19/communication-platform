<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Admin\Entities\Settings;
use Modules\Course\Entities\Section;
use Modules\Student\Entities\Student;
use App\Http\Controllers\UserBaseController;
use Illuminate\Contracts\Support\Renderable;
use Modules\FacultyMember\Entities\FacultyMember;
use Modules\Admin\Http\Requests\StoreAdminRequest;

class AdminController extends UserBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $TFA = Settings::where('name','2FA')->first();
        return view('admin::index',compact('TFA'));
    }

    public function facultyMembers()
    {
        $facultyMembers = FacultyMember::all();
        return view('admin::facultyMembers.index', compact('facultyMembers'));
    }

    public function students()
    {
        $students = Student::all();
        return view('admin::students.index', compact('students'));
    }

    public function sections()
    {
        $sections = Section::all();
        return view('admin::courses.sections.index', compact('sections'));
    }

    public function courses()
    {
        $courses = Course::all();
        return view('admin::courses.index', compact('courses'));
    }

    public function admins()
    {
        $admins = User::where('user_type', 'Admin')->orWhere('user_type', 'Admin/FacultyMember')->get();
        return view('admin::admins.index', compact('admins'));
    }

    public function charts()
    {
        return view('admin::charts.index');
    }


    public function addAdmin()
    {
        $users = User::where('user_type', 'FacultyMember')->get();

        return view('admin::admins.create', compact('users'));
    }

    public function storeAdmin(StoreAdminRequest $request)
    {
        $user = User::find($request->id);
        $user->user_type = "Admin/FacultyMember";
        $user->update();
        alert()->success('  ', 'تم اضافة المدير بنجاح')->autoclose(2000);
        return redirect()->route('admins');
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);
        if ($user->user_type == "Admin") {
            alert()->error('  ', 'لا يمكنك حذف المدير الرائيسي')->autoclose(2000);
            return redirect()->route('admins');
        }
        $user->user_type = "FacultyMember";
        $user->update();
        alert()->success('  ', 'تم الغاء الصلاحية بنجاح')->autoclose(2000);
        return redirect()->route('admins');
    }

    public function showFacultyMember($id)
    {
        $facultyMember = FacultyMember::find($id);
        return view('admin::facultyMembers.show', compact('facultyMember'));
    }


    public function showStudent($id)
    {
        $student = Student::find($id);
        return view('admin::students.show', compact('student'));
    }

    public function set2FA($val)
    {
        $TFA = Settings::where('name','2FA')->first();
        if($val == 'true'){
            $TFA->status = 1;

        }else{
            $TFA->status = 0;
        }
        $TFA->update();
        return response()->json(200);

    }
}

<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\Section;
use Modules\Student\Entities\Student;
use Modules\Course\Entities\ClassRoom;
use Illuminate\Contracts\Support\Renderable;
use Modules\FacultyMember\Entities\FacultyMember;
use Modules\Course\Http\Requests\StoreCourseRequest;
use Modules\Course\Http\Requests\StoreSectionRequest;
use Modules\Course\Http\Requests\StoreStudentRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('course::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::courses.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->all());
        return  redirect(route('courses'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('course::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('course::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return  redirect()->back() ;
    }

    public function createSection($id)
    {
        $course = Course::where('id',$id)->first();
        $facultyMembers= FacultyMember::all();
        return view('admin::courses.sections.create', compact('course','facultyMembers'));
    }


    public function storeSection(StoreSectionRequest $request)
    {
        Section::create($request->all());
        return  redirect(route('courses'));
    }

    public function deleteSection($id)
    {
        $section = Section::find($id);
        $section->delete();
        return  redirect()->back() ;
    }

    public function addStudent(Section $section)
    {
        $ClassRooms = ClassRoom::where('section_id',$section->id)->toBase()->pluck('student_id');
        $students = Student::all();
        $students = $students->whereNotIn('student_id', $ClassRooms)->all();

        return view('admin::courses.sections.add_student', compact('section','students'));
    }

    public function storeStudent(StoreStudentRequest $request)
    {
        $ClassRooms = ClassRoom::create($request->all());
        return  redirect(route('sections'));
    }

    public function deleteStudent($id)
    {
        $ClassRoom = ClassRoom::find($id);
        $ClassRoom->delete();
        return  redirect()->back() ;
    }
}

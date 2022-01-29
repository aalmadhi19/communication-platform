<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Modules\Course\Entities\Section;
use Modules\Student\Entities\Student;

class InformationController extends Controller
{

    public function studentInfo($email,$id)
    {
        $conversation = Conversation::find($id);
        $student = Student::where('email', $email)->first();
        $section = Section::find($conversation->section_id);
        $course = $section->Course()->first();
        return response()->json(['student' => $student, 'section' => $section, 'course' => $course]);
    }
}

<?php

namespace Modules\FacultyMember\Http\Controllers;

use Validator;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Conversations_users;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Entities\Section;
use Modules\Student\Entities\Student;
use App\Http\Requests\StoreNewMessage;
use Modules\Course\Entities\ClassRoom;
use App\Http\Controllers\UserBaseController;
use Illuminate\Contracts\Support\Renderable;
use Modules\FacultyMember\Entities\FacultyMember;

class MessageController extends UserBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $conversations = FacultyMember::authUser()->conversations()->pluck('conversation_id');
        $conversations = Conversation::whereIn('id', $conversations)->where('owner_email', '!=', Auth::user()->email)->latest()->paginate(10);

        return view('facultymember::all-messages.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $sections = FacultyMember::AuthUser()->sections()->get();
        if($sections->isEmpty()){
            alert()->error('  ', 'لايوجد لديك مواد')->autoclose(2000);
            return redirect()->route('faculty_member_home');
        }
        $courses = Section::getAllCourses($sections);
        $ClassRoom = ClassRoom::whereIn('section_id', $sections->pluck('id'))->toBase()->pluck('student_id');
        $students = Student::whereIn('student_id', $ClassRoom)->get();
        return view('facultymember::new-message.index', compact('courses', 'sections', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreNewMessage $request)
    {
        \DB::transaction(function () use ($request) {
            $conversation = Conversation::create($request->validated());
            Conversations_users::addUsers($conversation->id, $request->to);
            Message::create(array_merge($request->validated(), ['conversation_id' => $conversation->id, 'from' => Auth::user()->email]));
        });
        alert()->success('  ', 'تم الارسال بنجاح')->autoclose(2000);
        return redirect()->route('faculty_member_home');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id, $message = null)
    {
        $conversation = Conversation::where('id', $id)->first();
        $student = Student::where('email', $conversation->owner_email)->first();
        $users = $conversation->users()->get();
        $messages = $conversation->messages()->with('Owner')->get()->sortBy('created_at');

        if ($message) {
            if ($conversation->type != 'broadcast') {
                $message = Message::find($message);
                $message->read_at = now();
                $message->update();
                $student = Student::where('email', $message->from)->first();
            }
        }
        if ($conversation->type == 'broadcast') {
            return view('facultymember::all-messages.broadcast', compact('conversation', 'messages'));
        }
        if ($conversation->owner_email == Auth::user()->email) {
            $studentEmail =  $users->where('user_email', '!=', Auth::user()->email)->first();
            $student = Student::where('email', $studentEmail->user_email)->first();
            return view('facultymember::all-messages.show', compact('conversation', 'messages', 'student'));
        }

        return view('facultymember::all-messages.show', compact('conversation', 'messages', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('facultymember::edit');
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
        //
    }

    public function reply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string|max:255|min:2',
        ]);
        if ($validator->fails()) {
            $validator->validate();
        }
        $message = Message::where('conversation_id', $request->conversation_id)->first();
        Message::create(array_merge($request->all(), ['conversation_id' => $message->conversation_id, 'from' => Auth::user()->email, 'title' => '-']));
        return redirect()->back();
    }

    public function broadcast()
    {
        $sections = FacultyMember::AuthUser()->sections()->get();
        if($sections->isEmpty()){
            alert()->error('  ', 'لايوجد لديك مواد')->autoclose(2000);
            return redirect()->route('faculty_member_home');
        }
        $courses = Section::getAllCourses($sections);
        $ClassRoom = ClassRoom::whereIn('section_id', $sections->pluck('id'))->toBase()->pluck('student_id');
        $students = Student::whereIn('student_id', $ClassRoom)->get();
        return view('facultymember::broadcast.broadcast', compact('courses', 'sections', 'students'));
    }

    public function storeBroadcast(StoreNewMessage $request)
    {
        $conversation = Conversation::create($request->all());
        $section = Section::find($request->section_id);
        $students = $section->ClassRoom;
        $conversation_users = Conversations_users::addUsersBroadcast($students, $conversation->id);
        Message::create(array_merge($request->validated(), ['conversation_id' => $conversation->id, 'from' => Auth::user()->email]));
        alert()->success('  ', 'تم الارسال بنجاح')->autoclose(2000);
        return redirect()->route('faculty_member_home');
    }

    public function getSections(Request $request, $id)
    {

        $facultyMember = FacultyMember::where('email', auth()->user()->email)->first();
        $sections = Section::where('course_id', $id)->where('faculty_member_id', $facultyMember->id)->get();
        return response()->json($sections, 200);
    }

    public function getStudents(Request $request, $id)
    {
        $ClassRoom = ClassRoom::with('student')->where('section_id', $id)->get();
        return response()->json($ClassRoom, 200);
    }

    public function myMessages()
    {

        $conversations = FacultyMember::authUser()->conversations()->pluck('conversation_id');
        $conversations = Conversation::with('users')->whereIn('id', $conversations)->where('owner_email', '=', Auth::user()->email)->latest()->paginate(10);

        return view('facultymember::my-messages.index', compact('conversations'));
    }
}

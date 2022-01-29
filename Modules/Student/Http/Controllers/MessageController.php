<?php

namespace Modules\Student\Http\Controllers;

use Validator;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Conversations_users;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Entities\Section;
use Modules\Student\Entities\Student;
use App\Http\Requests\StoreNewMessage;
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
        $conversations = Student::authUser()->conversations()->pluck('conversation_id');
        $conversations = Conversation::with('receiver')->whereIn('id', $conversations)->where('owner_email', '=', Auth::user()->email)->latest()->paginate(10);

        return view('student::my-messages.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $ClassRooms = Student::AuthUser()->ClassRoom()->get();
        $sections = Student::getAllSections($ClassRooms);
        if (!$sections) {
            alert()->error('  ', 'عذرا لايوجد لديك مواد')->autoclose(2000);
            return redirect()->back();
        }
        return view('student::my-messages.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreNewMessage $request)
    {
        \DB::transaction(function () use ($request) {
            $to = Section::find($request->section_id)->facultyMember->email;
            $conversation = Conversation::create(array_merge($request->validated(), ['to' => $to]));
            Conversations_users::addUsers($conversation->id, $to);
            Message::create(array_merge($request->validated(), ['conversation_id' => $conversation->id, 'from' => Auth::user()->email]));
        });
        alert()->success('  ', 'تم ارسال إستفسارك بنجاح')->autoclose(2000);
        return redirect(route('my-messages'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id, $message = null)
    {
        $conversation = Conversation::with('Owner')->where('id', $id)->first();
        $users = $conversation->users();
        $messages = $conversation->messages()->with('Owner')->get()->sortBy('created_at');
        $facultyMember = $users->where('user_email', '!=', Auth::user()->email)->first();
        $facultyMember = FacultyMember::where('email', $facultyMember->user_email)->first();

        if ($message && $conversation->type != 'broadcast') {
            $message = Message::find($message);
            $message->read_at = now();
            $message->update();
        }
        if ($conversation->type == 'broadcast') {
            $conversationsUsers = Conversations_users::AuthUser()->where('conversation_id', $conversation->id)->first();
            $conversationsUsers->last_read = now();
            $conversationsUsers->update();
            return view('student::all-messages.broadcast', compact('conversation', 'messages'));
        }

        return view('student::my-messages.show', compact('conversation', 'messages', 'facultyMember'));
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

    public function allMessages()
    {
        $conversations = Student::AuthUser()->conversations()->pluck('conversation_id');
        $conversations = Conversation::whereIn('id', $conversations)->where('owner_email', '!=', Auth::user()->email)->latest()->paginate(10);

        return view('student::all-messages.index', compact('conversations'));
    }
}

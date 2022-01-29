<?php

namespace Modules\Student\Http\Controllers;

use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Conversations_users;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserBaseController;
use Illuminate\Contracts\Support\Renderable;

class StudentController extends UserBaseController
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $Conversations = Conversations_users::AuthUser()->where('last_read', null)->pluck('conversation_id');
        $ConversationIDs = Conversation::whereIn('id', $Conversations)->pluck('id');
        $notifications = Message::whereIn('conversation_id', $ConversationIDs)->where('from', '!=', Auth::user()->email)->where('read_at', '=', null)->orderBy('updated_at', 'DESC')->paginate(3);

        if ($request->ajax()) {
            $view = view('student::notifications', compact('notifications'))->render();
            return response()->json(['html' => $view]);
        }
        return view('student::index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($email)
    {

        return view('student::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('student::edit');
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
}

<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuids;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversations_users extends Model
{
    use Uuids,  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id',
        'user_email',
        'last_read'
    ];

    public function Conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public static function addUsers($id ,$to)
    {
        Conversations_users::create([
            'conversation_id' => $id,
            'user_email' => Auth::user()->email
        ]);

        Conversations_users::create([
            'conversation_id' => $id,
            'user_email' => $to
        ]);
    }

    public static function addUsersBroadcast($students, $id)
    {
        Conversations_users::create([
            'conversation_id' => $id,
            'user_email' => Auth::user()->email
        ]);

        foreach ($students as $student) {
            Conversations_users::create([
                'conversation_id' => $id,
                'user_email' => $student['student_id'].'@s.mu.edu.sa'
            ]);
        }
    }

    public function scopeAuthUser($query)
    {
        return $query->where('user_email', Auth::user()->email);
    }

}

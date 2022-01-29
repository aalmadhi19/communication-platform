<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuids;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Entities\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use Uuids,  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'owner_name',
        'owner_email',
        'type',
        'section_id'
    ];

    protected static function booted()
    {
        static::creating(function ($conversation) {
            $conversation->owner_name = Auth::user()->name;
            $conversation->owner_email = Auth::user()->email;
        });
    }

    public function Owner()
    {
        return $this->belongsTo(User::class, 'owner_email', 'email');
    }

    public function users()
    {
        return $this->hasMany(Conversations_users::class);
    }

    public function receiver()
    {
        return $this->hasOne(Conversations_users::class)->where('user_email', '!=', Auth::user()->email);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }


    public function NotAuthUserNotRead()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id')->where('from', '!=', Auth::user()->email)->where('read_at', '=', null);
    }

    public function scopeAuthUser($query)
    {
        return $query->where('owner_email', Auth::user()->email);
    }

    public function Section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }
}

<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use Uuids,  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id',
        'from',
        'title',
        'body',
    ];

    public function Conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function Owner()
    {
        return $this->belongsTo(User::class, 'from', 'email');
    }

    public function scopeAuthUser($query)
    {
        return $query->where('from', Auth::user()->email);
    }

    public function scopeNotAuthUser($query)
    {
        return $query->where('from', '!=', Auth::user()->email);
    }

    public function scopeIsRead($query)
    {
        return $query->where('read_at', '!=', null);
    }

    public function scopeIsNotRead($query)
    {
        return $query->where('read_at', '=', null);
    }

    public function getTitleAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function setTitleAttribute($value)
    {
        if ($value == NULL) {
            $this->attributes['title'] = Crypt::encryptString('-');
        }
        $this->attributes['title'] = Crypt::encryptString($value);
    }

    public function getBodyAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function setBodyAttribute($value)
    {

        $this->attributes['body'] = Crypt::encryptString($value);
    }
}

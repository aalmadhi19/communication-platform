<?php

namespace Modules\FacultyMember\Entities;

use App\Traits\Uuids;
use App\Models\Message;
use App\Models\Conversations_users;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Entities\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacultyMember extends Model
{
    use Uuids,  HasFactory;



    protected $fillable = [
        'name',
        'avatar',
        'email'
    ];

    protected static function newFactory()
    {
        return \Modules\FacultyMember\Database\factories\FacultyMemberFactory::new();
    }

    public function scopeAuthUser($query)
    {
        return $query->where('email', Auth::user()->email)->first();
    }

    public function conversations()
    {
        return $this->hasMany(Conversations_users::class, 'user_email', 'email')->get();
    }

    public function message()
    {
        return $this->hasMany(Message::class)->get();
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public static function facultyMemberCreate($data)
    {
        $result['name'] = $data['name'];
        $result['avatar'] = $data['avatar'];
        $result['email'] = $data['email'];
        return $result;
    }

    public static function store($data)
    {
        FacultyMember::create([
            'name' => $data['name'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
        ]);
    }
}

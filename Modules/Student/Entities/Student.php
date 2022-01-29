<?php

namespace Modules\Student\Entities;

use App\Traits\Uuids;
use App\Models\Message;
use App\Models\Conversations_users;
use Modules\Course\Entities\Course;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Entities\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use Uuids,  HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'avatar',
        'email'
    ];

    public function scopeAuthUser($query)
    {
        return $query->where('email', Auth::user()->email)->first();
    }

    // public function Courses(){
    //     return $this->hasMany(Course::class)->get();
    // }

    public function ClassRoom(){
        return $this->hasMany(ClassRoom::class,'student_id', 'student_id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversations_users::class, 'user_email', 'email');
    }

    public function message()
    {
        return $this->hasMany(Message::class)->get();
    }


    public static function getAllSections($ClassRooms)
    {
        foreach ($ClassRooms as $ClassRoom) {
            $sections[] = $ClassRoom->Section;
        };
        return $sections ?? null;
    }


    public function scopeStudentID($query)
    {
        $userMail = explode('@', Auth::user()->email);
        $studentID = $userMail[0];
        return $query->where('id', $studentID);
    }


    public static function studentCreate($data)
    {
        $userMail = explode('@', $data['email']);

        $result['student_id'] = $userMail[0];
        $result['name'] = $data['name'];
        $result['avatar'] = $data['avatar'];
        $result['email'] = $data['email'];

        return $result;
    }

    public static function store($data)
    {

        Student::create([
            'student_id' => $data['student_id'],
            'name' => $data['name'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
        ]);
    }


}

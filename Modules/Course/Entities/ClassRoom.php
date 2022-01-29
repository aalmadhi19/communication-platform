<?php

namespace Modules\Course\Entities;

use App\Traits\Uuids;
use Modules\Course\Entities\Section;
use Modules\Student\Entities\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{

    protected $table      = 'class_rooms';

    use Uuids,  HasFactory;

    protected $fillable = [
        'course_id',
        'section_id',
        'student_id',
    ];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\ClassRoomFactory::new();
    }

    public function student(){
        return $this->hasOne(Student::class,'student_id', 'student_id');
    }

    public function Section(){
        return $this->belongsTo(Section::class,'section_id');
    }

    // protected function getStudentIdAttribute($val)
    // {
    //    return Student::where('student_id',$val)->first()->name;
    // }

}

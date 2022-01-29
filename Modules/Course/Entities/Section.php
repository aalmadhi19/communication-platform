<?php

namespace Modules\Course\Entities;

use App\Traits\Uuids;
use Modules\Course\Entities\Course;
use Modules\Student\Entities\Student;
use Modules\Course\Entities\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Modules\FacultyMember\Entities\FacultyMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use Uuids, HasFactory;

    protected $fillable = [
        'course_id',
        'course_code',
        'code',
        'faculty_member_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\SectionFactory::new();
    }

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function ClassRoom()
    {
        return $this->hasMany(ClassRoom::class);
    }

    public function FacultyMember()
    {
        return $this->hasOne(FacultyMember::class, 'id', 'faculty_member_id');
    }

    public static function getAllCourses($sections)
    {
        foreach ($sections as $section) {
            $courses[] = $section->Course;
        };
        return $courses;
    }
}

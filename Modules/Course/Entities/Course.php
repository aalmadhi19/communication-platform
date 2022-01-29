<?php

namespace Modules\Course\Entities;

use App\Traits\Uuids;
use Modules\Course\Entities\Section;
use Illuminate\Database\Eloquent\Model;
use Modules\FacultyMember\Entities\FacultyMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use Uuids,  HasFactory;

    protected $fillable = [
        'course_id',
        'code',
        'name',
    ];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\CourseFactory::new();
    }

    public function Sections(){
        return $this->hasMany(Section::class)->get();
    }



}

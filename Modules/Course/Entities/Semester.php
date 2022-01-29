<?php

namespace Modules\Course\Entities;

use Modules\Course\Entities\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_code'
    ];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\SemesterFactory::new();
    }

    public function Sections(){
        return $this->belongsTo(Section::class);
    }
}

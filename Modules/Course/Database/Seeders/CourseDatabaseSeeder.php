<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Course\Entities\Course;
use Illuminate\Database\Eloquent\Model;

class CourseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Course::create([
            'course_code' => 'AW1223',
            'name' => 'Management ',
        ]);

        Course::create([
            'course_code' => 'SA123',
            'name' => 'Management ',
        ]);

        Course::create([
            'course_code' => 'SA1222',
            'name' => 'Management ',
        ]);
    }
}

<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Course\Entities\Semester;
use Illuminate\Database\Eloquent\Model;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Semester::create([
            'semester_code' => '211',
        ]);

        Semester::create([
            'semester_code' => '212',
        ]);


    }
}

<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Course\Entities\Section;
use Illuminate\Database\Eloquent\Model;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Section::create([
            'section_code' => '123',
        ]);

        Section::create([
            'section_code' => '2222',
        ]);

        Section::create([
            'section_code' => '1111',
        ]);
    }
}

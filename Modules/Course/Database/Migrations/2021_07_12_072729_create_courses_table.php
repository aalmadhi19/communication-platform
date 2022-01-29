<?php

use Modules\Course\Entities\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Course::create([
            'code' => 'SLAM101',
            'name' => 'الثقافة الاسلامية',
        ]);
        Course::create([
            'code' => 'MATH102',
            'name' => 'تفاضل وتكامل',
        ]);
        Course::create([
            'code' => 'IT380',
            'name' => 'امن شبكات',
        ]);
        Course::create([
            'code' => 'IT180',
            'name' => 'اساسيات الامن',
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

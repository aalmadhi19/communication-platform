<?php

use Modules\Student\Entities\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Student::create([
            'student_id' => '381101731',
            'name' => 'عبدالعزيز الماضي',
            'avatar' => 'default.jpeg',
            'email' => '381101731@s.mu.edu.sa',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

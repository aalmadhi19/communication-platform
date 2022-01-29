<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\FacultyMember\Entities\FacultyMember;

class CreateFacultyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->timestamps();
        });

        FacultyMember::create([
            'name' => 'د.عبدالله محمد',
            'avatar' => 'default.jpeg',
            'email' => 'a.almadhi@mu.edu.sa',
            'user_type' => 'FacultyMember'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_members');
    }
}

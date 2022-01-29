<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Admin\Http\Middleware\Admin;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_type');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'Admin',
            'avatar' => 'default.jpeg',
            'email' => 'admin@mu.edu.sa',
            'password' => Hash::make('12345678'),
            'user_type' => 'Admin'
        ]);
        User::create([
            'name' => 'عبدالعزيز الماضي',
            'avatar' => 'default.jpeg',
            'email' => '11111111@s.mu.edu.sa',
            'password' => Hash::make('12345678'),
            'user_type' => 'Student'
        ]);
        User::create([
            'name' => 'د.عبدالله محمد',
            'avatar' => 'default.jpeg',
            'email' => 'a.almadhi@mu.edu.sa',
            'password' => Hash::make('12345678'),
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
        Schema::dropIfExists('users');
    }
}

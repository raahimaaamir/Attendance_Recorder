<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {

                // Drop existing 'users' table if it exists
        Schema::dropIfExists('users');

        // Create 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 200);
            $table->string('email', 200)->unique();
            $table->enum('role', ['teacher', 'student', 'admin']);
            $table->string('password', 200);
            $table->timestamps();
        });

        // Drop existing 'class' table if it exists
        Schema::dropIfExists('class');

        // Create 'class' table
        Schema::create('class_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacherid')->constrained('users')->onDelete('cascade');
            $table->time('starttime');
            $table->time('endtime');
            $table->integer('credit_hours');
            $table->timestamps();
        });

        Schema::dropIfExists('teachers');

        Schema::create('teachers', function (Blueprint $table){
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('classid')->constrained('class')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::dropIfExists('students');

        Schema::create('students', function (Blueprint $table){
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('classid')->constrained('class')->onDelete('cascade');
            $table->timestamps();
        });
        // Drop existing 'attendance' table if it exists
        Schema::dropIfExists('attendance');

        // Create 'attendance' table
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classid')->constrained('class')->onDelete('cascade');
            $table->foreignId('studentid')->constrained('users')->onDelete('cascade');
            $table->tinyInteger('isPresent');
            $table->string('comments', 200);
            $table->timestamps();
        });

        // Drop existing 'class_sessions' table if it exists
        Schema::dropIfExists('class_sessions');

        // Create 'class_sessions' table
        Schema::create('class_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('class')->onDelete('cascade');
            $table->string('day', 100);
            $table->timestamps();
        });

        // Drop existing 'sessions' table if it exists
        Schema::dropIfExists('sessions');

        // Create 'sessions' table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->timestamps();
        });
        
        Schema::dropIfExists('password_reset_tokens');

        Schema::create('password_reset_tokens', function (Blueprint $table) {
        $table->string('email')->primary();
        $table->string('token');
        $table->timestamp('created_at')->nullable();
        });

    }
    public function down()
    {
        // Drop all tables if migration is rolled back
        Schema::dropIfExists("teachers");
        Schema::dropIfExists("students");
        Schema::dropIfExists('class_sessions');
        Schema::dropIfExists('attendance');
         Schema::dropIfExists('class');
        Schema::dropIfExists('users');     
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');   
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('email')->unique();
            //
            $table->string('phone');
            $table->string('address');
            $table->string('user_type')->default('customer'); // admin, manager, auditor, receptionist, customer
            $table->boolean('active_account')->default(true);
            //
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->timestamp('last_login_at')->nullable(); // C:\xampp\htdocs\uog-thesis-projects\hotel-management\vendor\laravel\ui\auth-backend\AuthenticatesUsers.php
            $table->rememberToken();
            $table->timestamps();
        });
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

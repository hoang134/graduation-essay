<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('birthday')->nullable();;
            $table->bigInteger('code')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('class')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->enum('gender',[User::GENDER_MALE, User::GENDER_FEMALE])->nullable();
            $table->enum('role',[User::ROLE_ADMIN, User::ROLE_USER,User::ROLE_SUPER_ADMIN]);
            $table->rememberToken();
            $table->timestamps();
//            $table->softDeletes();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\UserPost;

class CreateUserPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->string('note')->default('---');
            $table->string('note_2')->default('---');
            $table->float('scores')->default(0.0);
            $table->enum('type',[UserPost::TYPE_REGISTER,UserPost::TYPE_POST]);
            $table->string('status_register')->default(UserPost::STATUS_REGISTER_REQUEST);
            $table->string('status')->default(UserPost::STATUS_ELIMINATED);

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
        Schema::dropIfExists('user_posts');
    }
}

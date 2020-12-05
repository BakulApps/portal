<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_image')->nullable();
            $table->string('user_fullname', 200);
            $table->string('user_name', 50);
            $table->string('user_pass');
            $table->string('user_email', 50);
            $table->string('user_role');
            $table->mediumText('user_desc')->nullable();
            $table->string('user_facebook')->nullable();
            $table->string('user_instagram')->nullable();
            $table->string('user_twitter')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__users');
    }
}

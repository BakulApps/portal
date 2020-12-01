<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('post_image')->nullable();
            $table->integer('post_author');
            $table->integer('post_category');
            $table->string('post_title');
            $table->text('post_content');
            $table->boolean('post_comment');
            $table->timestamps();
        });

        Schema::create('entity__posts_tag', function (Blueprint $table) {
            $table->id('post_tag_id');
            $table->integer('post_id');
            $table->integer('tag_id');
        });

        Schema::create('entity__posts_comment', function (Blueprint $table){
            $table->id('post_comment_id');
            $table->integer('post_id');
            $table->integer('comment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__posts');
        Schema::dropIfExists('entity__posts_tag');
        Schema::dropIfExists('entity__posts_comment');
    }
}

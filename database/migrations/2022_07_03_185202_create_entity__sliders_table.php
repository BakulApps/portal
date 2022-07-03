<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__sliders', function (Blueprint $table) {
            $table->id('slider_id');
            $table->string('slider_bg_image');
            $table->string('slider_image');
            $table->string('slider_title');
            $table->string('slider_content');
            $table->string('slider_button')->nullable();
            $table->enum('slider_status', [1, 2])->default(1);
            $table->integer('slider_creater');
            $table->integer('slider_updater')->nullable();
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
        Schema::dropIfExists('entity__sliders');
    }
};

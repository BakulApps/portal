<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('event_image', 100)->nullable();
            $table->string('event_title', 100);
            $table->mediumText('event_content');
            $table->string('event_place', 100);
            $table->time('event_time');
            $table->date('event_date_start');
            $table->date('event_date_end');
            $table->string('event_galery')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity__events');
    }
}

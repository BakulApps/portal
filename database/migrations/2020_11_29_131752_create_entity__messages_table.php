<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity__messages', function (Blueprint $table) {
            $table->id('message_id');
            $table->string('message_name', 100);
            $table->string('message_email', 100);
            $table->string('message_subject', 100);
            $table->text('message_content');
            $table->boolean('message_read');
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
        Schema::dropIfExists('entity__messages');
    }
}

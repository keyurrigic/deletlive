<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_reply_id')->index();
            $table->text('image');
            $table->timestamps();
            $table->foreign('ticket_reply_id')
            ->references('id')
            ->on('ticket_replies')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_attachments');
    }
}

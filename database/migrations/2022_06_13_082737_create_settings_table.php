<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('headerlogo');
            $table->string('footerlogo');
            $table->text('footercontent');
            $table->string('trytitle');
            $table->text('trydescription');
            $table->string('trybuttontext');
            $table->string('trybuttonlink');
            $table->string('howitworktitle');
            $table->text('howitworkcontent');
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
        Schema::dropIfExists('settings');
    }
}

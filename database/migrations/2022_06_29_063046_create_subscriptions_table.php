<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('order_id')->index();
            $table->integer('subscription_amount')->nullable();
            $table->string('subscriptionid')->nullable();
            $table->string('current_period_start')->nullable();
            $table->string('current_period_end')->nullable();
            $table->string('latest_invoice')->nullable();
            $table->text('jsonresponse')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')
            ->references('id')
            ->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
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
        Schema::dropIfExists('subscriptions');
    }
}

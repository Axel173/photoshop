<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('status_id')->unsigned()->default(1);
            $table->unsignedBigInteger('user_id');
            $table->integer('total_price')->unsigned();
            $table->text('first_name');
            $table->text('last_name');
            $table->text('email');
            $table->text('description');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->references('id')->on('shop_order_statuses');
            //$table->foreign('payment_id')->references('id')->on('shop_payments');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
}

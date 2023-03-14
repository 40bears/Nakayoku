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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id()->startingValue(10000);
            $table->bigInteger('product_id');
            $table->bigInteger('game_id');
            $table->bigInteger('buyer_user_id');
            $table->bigInteger('seller_user_id');
            $table->bigInteger('amount');
            $table->bigInteger('quantity');
            $table->timestamps();
            $table->bigInteger('deal_rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

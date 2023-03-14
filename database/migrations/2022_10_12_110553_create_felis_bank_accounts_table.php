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
        Schema::create('felis_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('japanese_bank_name')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('japanese_branch_name')->nullable();
            $table->enum('account_type', ['SAVINGS', 'CURRENT'])->default('SAVINGS');
            $table->string('branch_code')->nullable();
            $table->bigInteger('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('japanese_account_name')->nullable();
            $table->enum('default_product', ['ITEM', 'CURRENCY', 'ACCOUNT'])->nullable();
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
        Schema::dropIfExists('felis_bank_accounts');
    }
};

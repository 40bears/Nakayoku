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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('display_name')->nullable();
            $table->longText('introduction')->nullable();
            $table->string('base_currency')->default('JPY');
            $table->string('email')->unique();
            $table->date('DOB')->nullable();
            $table->string('password');
            $table->bigInteger('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable();
            $table->bigInteger('balance')->default(0);
            $table->enum('user_type', ['admin', 'member'])->default('member');
            $table->string('document_type')->nullable();
            $table->string('document')->nullable();
            $table->enum('document_verification', ['VERIFIED', 'NOT_VERIFIED'])->default('NOT_VERIFIED');
            $table->bigInteger('user_rating')->default(0);
            $table->bigInteger('total_ratings')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

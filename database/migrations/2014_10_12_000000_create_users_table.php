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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('naked');
            $table->string('state_name')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('lg_name')->nullable();
            $table->integer('lga_id')->nullable();
            $table->string('ward_name')->nullable();
            $table->integer('ward_id')->nullable();
            $table->string('unit_name')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('party_id')->nullable();
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

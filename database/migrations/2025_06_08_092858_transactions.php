<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('slug')->unique();
            $table->string('phone');
            $table->string('name');
            $table->string('nik');
            $table->string('method');
            $table->string('bank')->nullable();
            $table->integer('total');
            $table->string('status')->default('pending'); 
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

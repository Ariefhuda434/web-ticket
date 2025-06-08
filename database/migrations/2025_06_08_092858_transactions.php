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
        $table->string('phone');
        $table->string('name');
        $table->string('nim');
        $table->string('method');
        $table->string('bank')->nullable();
        $table->integer('total');
        $table->string('status')->default('pending'); // status pembayaran
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

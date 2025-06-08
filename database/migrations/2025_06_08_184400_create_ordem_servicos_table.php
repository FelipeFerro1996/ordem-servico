<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 100);
            $table->date('data_abertura');
            $table->unsignedBigInteger('clientes_id');
            $table->foreign('clientes_id')->on('clientes')->references('id');
            $table->unsignedBigInteger('produtos_id');
            $table->foreign('produtos_id')->on('produtos')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_servicos');
    }
};

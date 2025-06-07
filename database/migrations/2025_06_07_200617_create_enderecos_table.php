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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua', 255);
            $table->string('numero', 20);
            $table->string('bairro', 150);
            $table->string('cidade', 150);
            $table->string('estado', 50);
            $table->string('cep', 10);
            $table->unsignedBigInteger('clientes_id');
            $table->foreign('clientes_id')->on('clientes')->references('id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};

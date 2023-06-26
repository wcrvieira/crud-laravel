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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("cnpj", 14);
            $table->string("razaoSocial", 50);
            $table->string("inscEst", 12);
            $table->string("endereco", 60);
            $table->string("cidade", 50);
            $table->string("estado", 2);
            $table->string("telefone", 20);
            $table->string("email", 50);
            $table->string("site", 70);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};

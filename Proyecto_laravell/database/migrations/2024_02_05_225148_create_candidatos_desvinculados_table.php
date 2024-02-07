<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('candidatos_desvinculados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->foreignId('vacante_id')->references('id')->on('vacantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void    {
        Schema::dropIfExists('candidatos_desvinculados');
    }
};

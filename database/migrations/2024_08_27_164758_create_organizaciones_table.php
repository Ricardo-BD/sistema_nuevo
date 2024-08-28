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
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_organizacion')->nullable();
            $table->enum('regimen_fiscal', ['Persona Fisica', 'Persona Moral']);
            $table->string('rfc')->unique();
            $table->string('nombre_comercial')->nullable();
            $table->string('correo_electronico')->unique();
            $table->string('telefono')->nullable();
            $table->string('telefono_movil')->nullable();
            $table->enum('estatus', ['Activo', 'Inactivo'])->default('Activo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con tabla users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizaciones');
    }
};

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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rota')->nullable();
            $table->string('icone')->nullable();
            $table->integer('ordem')->default(0);
            $table->foreignId('menu_pai_id')->nullable()->constrained('menus');
            $table->foreignId('permissao_id')->nullable()->constrained('permissoes');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

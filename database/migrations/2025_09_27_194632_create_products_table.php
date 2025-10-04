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
    Schema::create('products', function (Blueprint $table) {
        $table->id(); 
        $table->string('nome');
        $table->text('descricao')->nullable(); 
        $table->decimal('preco_venda', 8, 2); 
        $table->decimal('preco_compra', 8, 2)->default(0); 
        $table->integer('estoque');
        $table->string('imagem_url'); 
        $table->string('status')->default('ativo');
        $table->date('data_validade')->nullable();
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

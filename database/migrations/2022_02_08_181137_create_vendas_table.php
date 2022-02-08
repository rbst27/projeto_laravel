<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_produto');
            $table->decimal('valor',5,2);
            $table->integer('quantidade');
            $table->foreign('id_produto')->references('id')->on('produtos');

        });
        
        Schema::create('venda_pedido', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_venda');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_venda')->references('id')->on('vendas');
            $table->primary(['id_pedido', 'id_venda']);
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}

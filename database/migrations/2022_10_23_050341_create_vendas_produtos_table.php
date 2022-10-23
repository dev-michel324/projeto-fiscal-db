<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas_produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->bigInteger('venda_id')->unsigned();
            $table->foreign('venda_id')->references('id')->on('vendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas_produtos');
    }
};

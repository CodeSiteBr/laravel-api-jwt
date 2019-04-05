<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->timestamps();
        });

        // Schema::create('produtos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('user_id')->unsigned();
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->string('produto');
        //     $table->integer('quantidade');
        //     $table->double('preco', 10, 2)->default(0);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

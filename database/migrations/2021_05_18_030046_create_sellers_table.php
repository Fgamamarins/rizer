<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function(Blueprint $table) {
            $table->id();
            $table->string("name", 255)->comment("Nome do vendedor");
            $table->string("email", 255)->comment("Email do vendedor");
            $table->unsignedBigInteger("phone")->comment("Telefone do vendedor");
            $table->unsignedTinyInteger("status_enum")->comment("Estado do vendedor do vendedor (Ativo/Inativo)");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}

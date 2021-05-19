<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 255)->comment("Assunto do chamado");
            $table->text('description')->comment("Descrição do chamado");
            $table->dateTime('open_ticket_date')->comment("Data de abertura do ticket");
            $table->unsignedTinyInteger('status_enum')->comment("Enum's de status de pedido");
            $table->unsignedBigInteger('seller_id')->comment("Foreign key de vendedor")->nullable();
            $table->timestamps();
        });

        Schema::table('support_tickets', function(Blueprint $table) {
            $table->foreign('seller_id')->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_tickets', function(Blueprint $table) {
            $table->dropForeign(['seller_id']);
        });

        Schema::dropIfExists('support_tickets');
    }
}

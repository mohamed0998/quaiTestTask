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
        Schema::create('commande_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('service_id')->unsigned();
            $table->foreign('service_id') ->references('id') ->on('services')->onDelete('cascade');
          
            $table->integer('commande_id')->unsigned();
            $table->foreign('commande_id') ->references('id') ->on('commandes')->onDelete('cascade');
            
            $table->integer('quantity')->default(0);
            $table->double('total')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_commandes');
    }
};

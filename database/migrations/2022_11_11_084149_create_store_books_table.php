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
        Schema::create('store_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('total');
            $table->string('nameBook');
            $table->unsignedBigInteger('idBook');
            $table->unsignedBigInteger('storeBooks');
            $table->unsignedBigInteger('borrowBooks');
            $table->foreign('idBook')->references('id')->on('books');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_books');
    }
};

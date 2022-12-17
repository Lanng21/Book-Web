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
        Schema::create('reborrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idBook');
            $table->tinyInteger('returned');
            $table->timestamp('dateBorrow');
            $table->date('deadline');
            $table->timestamps();
            $table->foreign('idBook')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reborrows');
    }
};

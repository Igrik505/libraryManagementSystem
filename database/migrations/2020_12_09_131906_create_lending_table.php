<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lending', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reader_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->date('date');
            $table->date('lendingEndDate');
            $table->foreign('reader_id')->references('id')->on('reader')->cascadeOnUpdate();
            $table->foreign('book_id')->references('id')->on('book');
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
        Schema::dropIfExists('lending');
    }
}

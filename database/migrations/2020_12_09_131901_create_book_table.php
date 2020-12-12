<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('inventoryNumber');
            $table->bigInteger('publisher_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('typeOfBook_id')->unsigned();
            $table->foreign('publisher_id')->references('id')->on('publisher')->cascadeOnUpdate();
            $table->foreign('author_id')->references('id')->on('author')->cascadeOnUpdate();
            $table->foreign('typeOfBook_id')->references('id')->on('type_of_book')->cascadeOnUpdate();
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
        Schema::dropIfExists('book');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuancesTable extends Migration
{
    public function up()
    {
        Schema::create('issuances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('reader_id');
            $table->date('issue_date');
            $table->date('return_date')->nullable();
            $table->timestamps();

            // Внешние ключи
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('reader_id')->references('id')->on('readers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('issuances');
    }
}
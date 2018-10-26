<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn')->unique();
            $table->string('title');
            $table->string('author_firstname');
            $table->string('author_lastname');
            $table->date('release_date');
            $table->string('distributor');
            $table->integer('edition');
            $table->string('genre');
            $table->text('discription');
            $table->string('language')->default("Nederlands");
            $table->integer('amount')->default(1);
            $table->integer('amount_loaned')->default(0);
            $table->integer('minimum_age')->default(0);
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
        Schema::dropIfExists('books');
    }
}

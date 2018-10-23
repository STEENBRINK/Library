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
            $table->string('author_lasttname');
            $table->date('release_date');
            $table->string('distributor');
            $table->integer('edition');
            $table->text('discription');
            $table->date('date_added');
            $table->integer('amount');
            $table->integer('amount_loaned');
            $table->integer('minimum_age');
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

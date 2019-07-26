<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingCategoryAndAuthorToEbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebook', function (Blueprint $table) {
            $table->string('category',100);
            $table->string('author',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ebook', function (Blueprint $table) {
            $table->string('category',100);
            $table->string('author',100);
        });
    }
}

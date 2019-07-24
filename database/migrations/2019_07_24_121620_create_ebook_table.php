<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebook', function (Blueprint $table) {
            $table->bigIncrements('eid');
            $table->string('title',100);
            $table->string('desc',1000);
            $table->float('price',10,2);
            $table->string('coverpic',100);
            $table->string('pdf',100);
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
        Schema::dropIfExists('ebook');
    }
}

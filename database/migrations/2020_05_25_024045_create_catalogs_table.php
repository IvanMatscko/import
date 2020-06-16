<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('rubric')->nullable();
            $table->longText('categories')->nullable();
            $table->longText('brand')->nullable();
            $table->longText('product_name')->nullable();
            $table->string('code')->nullable();
            $table->longText('description', 6200)->nullable();
            $table->longText('price')->nullable();
            $table->longText('guarantee')->nullable();
            $table->longText('availability')->nullable();

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
        Schema::dropIfExists('catalogs');
    }
}

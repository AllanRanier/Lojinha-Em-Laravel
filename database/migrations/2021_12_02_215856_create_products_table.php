<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categorys');

            $table->foreignId('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('categorys');

            $table->string('name', 60);
            $table->string('code', 10);
            $table->integer('qta');
            $table->string('image', 60);
            $table->longText('details');
            $table->integer('value');

            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('store_id');
            $table->string('name');
            $table->integer('price')->nullable();
            $table->string('stock')->nullable();
            $table->string('rate')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->text('picturePath')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('store_id')
              ->references('id')
              ->on('stores')
              ->onDelete('cascade');
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
};

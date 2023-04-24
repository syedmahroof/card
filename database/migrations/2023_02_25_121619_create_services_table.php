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
            $table->text('title')->nullable();
            $table->string('price')->nullable();
            $table->string('stock')->nullable()->default(0);
            $table->string('status')->nullable()->default(1);
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('key_itineraries')->nullable();
            $table->longText('key_exclusions')->nullable();
            $table->longText('key_inclusions')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};

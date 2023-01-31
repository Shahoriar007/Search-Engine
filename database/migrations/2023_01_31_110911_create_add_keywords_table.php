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
        Schema::create('add_keywords', function (Blueprint $table) {
            $table->id();
            $table->string('keyword')->nullable();
            $table->string('price')->nullable();
            $table->string('quality')->nullable();

            $table->unsignedBigInteger('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('add_businesses')->onDelete('cascade');

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
        Schema::dropIfExists('add_keywords');
    }
};

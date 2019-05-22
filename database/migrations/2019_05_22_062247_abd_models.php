<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AbdModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abd_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('sold', ['sold', 'parked'])->default('parked');
            $table->unsignedInteger('manufacturer_id');
            // $table->foreign('manufacturer_id')->references('id')->on('abd_manufacturers')->onDelete('cascade');
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
        Schema::dropIfExists('abd_models');
    }
}

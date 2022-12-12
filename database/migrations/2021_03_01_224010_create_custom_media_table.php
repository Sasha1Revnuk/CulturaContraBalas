<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_media', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('path');
            $table->string('mediaAble_id');
            $table->string('mediaAble_type');
            $table->string('key')->nullable();
            $table->string('alt')->nullable();
            $table->integer('range');
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
        Schema::dropIfExists('custom_media');
    }
}

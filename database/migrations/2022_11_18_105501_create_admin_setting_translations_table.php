<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_settings_translations', function (Blueprint $table) {
            $table->id();
            $table->string('language_slug', 5);
            $table->string('title', 190);
            $table->unsignedBigInteger('admin_settings_id');
            $table->foreign('admin_settings_id')->references('id')->on('admin_settings')->onDelete('cascade');
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
        Schema::dropIfExists('admin_settings_translations');
    }
};

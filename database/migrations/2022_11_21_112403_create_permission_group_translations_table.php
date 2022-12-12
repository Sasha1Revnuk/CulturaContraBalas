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
        Schema::create('permission_group_translations', function (Blueprint $table) {
            $table->id();
            $table->string('language_slug', 190);
            $table->string('title', 190);
            $table->unsignedBigInteger('permission_group_id');
            $table->foreign('permission_group_id')->references('id')->on('permission_groups')->onDelete('cascade');
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
        Schema::dropIfExists('permission_group_translations');
    }
};

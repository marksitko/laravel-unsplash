<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnsplashAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unsplash_assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('unsplash_id');
            $table->string('name')->unique();
            $table->string('author');
            $table->string('author_link');
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
        Schema::dropIfExists('unsplash_assets');
    }
}

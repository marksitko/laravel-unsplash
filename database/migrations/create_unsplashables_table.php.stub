<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnsplashablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unsplashables', function (Blueprint $table) {
            $table->unsignedBigInteger('unsplash_asset_id');
            $table->unsignedBigInteger('unsplashables_id');
            $table->string('unsplashables_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unsplashables');
    }
}

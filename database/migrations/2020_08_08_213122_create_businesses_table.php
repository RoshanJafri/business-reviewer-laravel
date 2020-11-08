<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->string('phone_number');
            $table->string('website_url');
            $table->string('email');
            $table->string('slug')->unique();
            $table->string('geo_location');

            $table->text('description');

            $table->integer('average_review')->default(0);
            $table->string('front_image');
            $table->unsignedBigInteger('owner_id');

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
        Schema::dropIfExists('businesses');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string("address");
            $table->string("district");
            $table->string("city");
            $table->integer("rooms")->unsigned();
            $table->integer("beds")->unsigned();
            $table->integer("vacancies");
            $table->float("price");
            $table->unsignedBigInteger('landlord_id');
            $table->timestamps();
        });

        Schema::table('ads', function (Blueprint $table) {
           $table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}

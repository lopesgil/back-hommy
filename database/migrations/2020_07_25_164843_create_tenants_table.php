<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("cpf")->unique();
            $table->string("phone")->nullable();
            $table->string("email")->unique();
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->timestamps();
        });

        Schema::table('tenants', function (Blueprint $table) {
           $table->foreign('ad_id')->references('id')->on('ads')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}

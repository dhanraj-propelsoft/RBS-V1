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
        Schema::create('order_site_details', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('order_id');
            $table->string('site_name',200)->nullable(true);
            $table->string('plot_number',200)->nullable(true);
            $table->string('street',200)->nullable(true);
            $table->string('city',200)->nullable(true);
            $table->string('land_mark',200)->nullable(true);
            $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_site_details');
    }
};

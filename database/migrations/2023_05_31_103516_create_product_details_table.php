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
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('product_id');
            $table->date('eff_date')->nullable(true);
            $table->integer('mrp')->nullable(true);
            $table->integer('discount')->nullable(true);
            $table->integer('special_price')->nullable(true);
            $table->integer('tax')->nullable(true);
            $table->integer('status')->default(1);
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::dropIfExists('product_details');
    }
};

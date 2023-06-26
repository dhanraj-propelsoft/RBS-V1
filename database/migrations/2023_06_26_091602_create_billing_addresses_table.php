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
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('person_id');
            $table->string('person_name',200);
            $table->integer('block_plot_number');
            $table->string('street',200);
            $table->string('city',200);
            $table->integer('net_amount')->nullable(true);
            $table->integer('advance')->nullable(true);
            $table->foreign('person_id')->references('id')->on('persons')
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
        Schema::dropIfExists('billing_addresses');
    }
};

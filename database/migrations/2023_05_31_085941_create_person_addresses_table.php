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
        Schema::create('person_addresses', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('person_id');
            $table->string('site_name',200)->nullable(true);
            $table->integer('site_plot_no');
            $table->string('street',200);
            $table->string('city',200);
            $table->string('land_mark',200);
            $table->integer('party_details')->default(0);
            $table->string('customer_name',200)->nullable(true);
            $table->string('customer_number',200)->nullable(true);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('person_id')->references('id')->on('persons')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_addresses');
    }
};

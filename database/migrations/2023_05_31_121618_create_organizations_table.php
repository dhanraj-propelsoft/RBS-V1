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
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->string('organization_name',200);
            $table->integer('title_id')->nullable(true);
            $table->integer('person_id')->nullable(true);
            $table->string('gst',200)->nullable(true);
            $table->string('plot_number',200)->nullable(true);
            $table->string('street',200)->nullable(true);
            $table->string('city',200)->nullable(true);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('organizations');
    }
};

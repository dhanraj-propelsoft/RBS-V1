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
        Schema::create('person_service_types', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('person_id');
            $table->integer('service_type_id');
            $table->foreign('person_id')->references('id')->on('persons')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('service_type_id')->references('id')->on('service_types')
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
        Schema::dropIfExists('person_service_types');
    }
};

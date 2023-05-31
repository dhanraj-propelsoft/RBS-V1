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
        Schema::create('address_types', function (Blueprint $table) {
            $table->increments('id')->unsigned(false);
            $table->integer('person_id');
            $table->integer('address_id')->nullable(true);            
            $table->integer('address_of')->default(2);          
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
        Schema::dropIfExists('address_types');
    }
};

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
            $table->integer('address_type');   
            $table->integer('door_no')->nullable(true);   
            $table->integer('pin')->nullable(true);     
            $table->string('building_name',200)->nullable(true); 
            $table->string('area',200)->nullable(true); 
            $table->string('street',200)->nullable(true);
            $table->string('landmark',200)->nullable(true);  
            $table->string('district',200)->nullable(true); 
            $table->string('city',200)->nullable(true);
            $table->string('state',200)->nullable(true); 
            $table->string('country',200)->nullable(true);        
            $table->integer('status')->default(1);
            $table->string('location',200)->nullable(true);                    
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

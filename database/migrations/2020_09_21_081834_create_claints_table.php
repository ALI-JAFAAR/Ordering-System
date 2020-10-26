<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){   
        Schema::defaultStringLength(191);
        Schema::create('claints', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ord_num');
            $table->string('phone');
            $table->string('address');
            $table->string('point');
            $table->string('del_count');
            $table->longText('item');
            $table->longText('total');
            $table->longText('count');
            $table->string('notes');
            $table->integer('user_id');
            $table->timestamps();
        });
    }
    
    /**  
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claints');
    }
}

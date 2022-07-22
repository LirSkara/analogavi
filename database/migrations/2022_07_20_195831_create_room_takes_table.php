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
        Schema::create('room_takes', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('what_i_sell');
            $table->text('sell_and_buy');
            $table->text('adres');
            $table->text('count_bed')->nullable();
            $table->text('count_sleeping_places')->nullable();
            $table->text('TV')->nullable();
            $table->text('wi_fi')->nullable();
            $table->text('stove')->nullable();
            $table->text('nuke')->nullable();
            $table->text('fridge')->nullable();
            $table->text('washing_machine')->nullable();
            $table->text('conditioner')->nullable();
            $table->text('parking')->nullable();
            $table->text('may_children')->nullable();
            $table->text('may_animal')->nullable();
            $table->text('allowed_smoke')->nullable();
            $table->text('description');
            $table->text('price');
            $table->text('city');
            $table->text('status');
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
        Schema::dropIfExists('room_takes');
    }
};

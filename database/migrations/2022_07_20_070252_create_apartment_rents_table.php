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
        Schema::create('apartment_rents', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('what_i_sell');
            $table->text('sell_and_buy');
            $table->text('adres');
            $table->text('number_flat');
            $table->text('who_add');
            $table->text('online_display');
            $table->text('type_time');
            $table->text('type_residential');
            $table->text('floor');
            $table->text('count_rooms');
            $table->text('square');
            $table->text('residential_square')->nullable();
            $table->text('conditioner')->nullable();
            $table->text('fridge')->nullable();
            $table->text('stove')->nullable();
            $table->text('nuke')->nullable();
            $table->text('washing_machine')->nullable();
            $table->text('dishwasher')->nullable();
            $table->text('water_heater')->nullable();
            $table->text('TV')->nullable();
            $table->text('wi_fi')->nullable();
            $table->text('television')->nullable();
            $table->text('type_home');
            $table->text('floor_home');
            $table->text('elevator')->nullable();
            $table->text('closed_territory')->nullable();
            $table->text('children_playground')->nullable();
            $table->text('sports_ground')->nullable();
            $table->text('parking')->nullable();
            $table->text('max_guest')->nullable();
            $table->text('may_children');
            $table->text('may_animal');
            $table->text('allowed_smoke')->nullable();
            $table->text('realty_images')->nullable();
            $table->text('description');
            $table->text('method_sale')->nullable();
            $table->text('mortgage')->nullable();
            $table->text('sale_share')->nullable();
            $table->text('auction')->nullable();
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
        Schema::dropIfExists('apartment_rents');
    }
};

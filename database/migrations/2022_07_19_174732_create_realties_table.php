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
        Schema::create('realties', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('what_i_sell');
            $table->text('sell_and_buy');
            $table->text('cs_newold');
            $table->text('adres');
            $table->text('number_flat');
            $table->text('who_add');
            $table->text('online_display');
            $table->text('type_residential');
            $table->text('floor');
            $table->text('count_rooms');
            $table->text('square');
            $table->text('residential_square')->nullable();
            $table->text('type_home');
            $table->text('floor_home');
            $table->text('elevator')->nullable();
            $table->text('closed_territory')->nullable();
            $table->text('children_playground')->nullable();
            $table->text('sports_ground')->nullable();
            $table->text('parking')->nullable();
            $table->text('realty_images')->nullable();
            $table->text('description');
            $table->text('method_sale')->nullable();
            $table->text('mortgage')->nullable();
            $table->text('sale_share')->nullable();
            $table->text('auction')->nullable();
            $table->text('price');
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
        Schema::dropIfExists('realties');
    }
};

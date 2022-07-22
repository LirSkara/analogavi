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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('what_i_sell');
            $table->text('sell_and_buy');
            $table->text('adres');
            $table->text('who_add');
            $table->text('online_display');
            $table->text('object_type');
            $table->text('bath_or_sauna')->nullable();
            $table->text('swimming_pool')->nullable();
            $table->text('plot_status');
            $table->text('year_construction')->nullable();
            $table->text('wall_material');
            $table->text('floor_home');
            $table->text('count_rooms');
            $table->text('terrace_veranda')->nullable();
            $table->text('square');
            $table->text('square_region');
            $table->text('bathroom_home')->nullable();
            $table->text('bathroom_street')->nullable();
            $table->text('images')->nullable();
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
        Schema::dropIfExists('homes');
    }
};

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
        Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('type');
            $table->text('what_i_sell')->nullable();
            $table->text('sell_and_buy')->nullable();
            $table->string('id_adv');
            $table->string('user_adv');
            $table->text('name');
            $table->text('price');
            $table->text('city');
            $table->text('images')->nullable();
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
        Schema::dropIfExists('favourites');
    }
};

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
        Schema::create('jobs_resumes', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('type_job');
            $table->text('desired_position');
            $table->text('work_schedule');
            $table->text('work_experience')->nullable();
            $table->text('education')->nullable();
            $table->text('gender');
            $table->text('day_birth')->nullable();
            $table->text('month_birth')->nullable();
            $table->text('year_birth')->nullable();
            $table->text('read_trips')->nullable();
            $table->text('move')->nullable();
            $table->text('citizenship');
            $table->text('company_name')->nullable();
            $table->text('post')->nullable();
            $table->text('month_getting_started')->nullable();
            $table->text('year_getting_started')->nullable();
            $table->text('month_end_work')->nullable();
            $table->text('year_end_work')->nullable();
            $table->text('until_now')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('name_institution')->nullable();
            $table->text('specialization')->nullable();
            $table->text('year_graduation')->nullable();
            $table->text('knowledge_languages')->nullable();
            $table->text('images')->nullable();
            $table->text('description');
            $table->text('price')->nullable();
            $table->text('adres');
            $table->string('city');
            $table->string('status');
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
        Schema::dropIfExists('jobs_resumes');
    }
};

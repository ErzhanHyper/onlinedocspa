<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('doctors', function (Blueprint $table) {
         $table->id();

         $table->unsignedBigInteger('user_id');
         $table->foreign('user_id')->references('id')->on('users');

         $table->string('specialization_id');

         $table->unsignedBigInteger('qualification_id')->unsigned();
         $table->foreign('qualification_id')->references('id')->on('qualifications');

         $table->unsignedBigInteger('category_id')->unsigned();
         $table->foreign('category_id')->references('id')->on('categories');

         $table->string('service_id')->nullable();

         $table->unsignedBigInteger('clinic_id')->unsigned()->nullable();
         $table->foreign('clinic_id')->references('id')->on('clinics');

         $table->string('language_id')->nullable();

         $table->string('experience')->nullable();
         $table->text('description')->nullable();

         $table->string('video')->nullable();
         $table->string('gender')->nullable();
         $table->string('position')->nullable();
         $table->boolean('agreement')->nullable();

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
      Schema::dropIfExists('doctors');
   }
}

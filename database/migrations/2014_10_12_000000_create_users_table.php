<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('users', function (Blueprint $table) {
         $table->id();

         $table->unsignedBigInteger('role_id')->nullable();
         $table->foreign('role_id')->references('id')->on('roles');

         $table->string('lastname');
         $table->string('firstname');
         $table->string('middlename')->nullable();

         $table->unsignedBigInteger('city_id');
         $table->foreign('city_id')->references('id')->on('cities');

         $table->string('email')->unique();
         $table->timestamp('email_verified_at')->nullable();
         $table->string('password');
         $table->rememberToken();

         $table->string('photo')->nullable();

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
      Schema::dropIfExists('users');
   }
}

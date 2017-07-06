<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/*
 * Standaard migration voorbeelden van Laravel, Uitgecommentarieerd zodat deze niet steeds automatisch gaat draaien
 * 

class CreateUsersTable extends Migration
{

 // Run the migrations.


    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    // Reverse the migrations.
     
    // @return void
   
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

*/
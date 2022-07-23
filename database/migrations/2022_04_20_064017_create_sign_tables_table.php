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
        Schema::create('sign_tables', function (Blueprint $table) {
            $table->id();
            $table->string('fname');      //Name
            $table->string('lname');      //Age
            $table->string('email')->unique();
            $table->integer('dob');      //Name
            $table->integer('password');      //Age
            $table->integer('mobile');
            $table->integer('otp');

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
        Schema::dropIfExists('sign_tables');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('assigned_agent')->nullable();
            $table->text('name');
            $table->text('email')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('profile_picture')->nullable();
            $table->text('description')->nullable();
            $table->text('nic_number')->nullable();
            $table->text('address')->nullable();
            $table->text('status')->nullable();
            $table->text('country')->nullable();
            $table->text('city')->nullable();
            $table->text('monthly_income')->nullable();
            $table->text('occupation')->nullable();
            $table->text('id_photo')->nullable();
            $table->text('family_details')->nullable();
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
        Schema::dropIfExists('receivers');
    }
}

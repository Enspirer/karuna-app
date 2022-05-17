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
            $table->text('assigned_agent');
            $table->text('name')->nullable();
            $table->text('name_toggle')->nullable();
            $table->text('nick_name')->nullable();
            $table->text('age')->nullable();
            $table->text('gender')->nullable();
            $table->text('country')->nullable();
            $table->text('city')->nullable();
            $table->text('nic_number')->nullable();
            $table->text('address')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('occupation')->nullable();
            $table->text('bio')->nullable();
            $table->text('images')->nullable();
            $table->text('videos')->nullable();
            $table->text('audios')->nullable();
            $table->text('requirement')->nullable();
            $table->text('about_donation')->nullable();
            $table->text('account_number')->nullable();            
            $table->text('profile_image')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('email')->nullable();
            $table->text('status')->nullable();
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

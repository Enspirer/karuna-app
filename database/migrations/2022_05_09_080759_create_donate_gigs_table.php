<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_gigs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('agent_id');
            $table->text('package_id')->nullable();
            $table->text('fund')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('otp_code')->nullable();
            $table->text('verification_photo')->nullable();
            $table->text('thanks_message')->nullable();
            $table->text('is_paid')->nullable();
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
        Schema::dropIfExists('donate_gigs');
    }
}

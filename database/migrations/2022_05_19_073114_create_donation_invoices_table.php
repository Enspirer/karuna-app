<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('donor_id');
            $table->text('address');
            $table->text('phone_number');
            $table->text('amount');
            $table->text('agent_id');
            $table->text('receiver_id');
            $table->text('package_type');
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
        Schema::dropIfExists('donation_invoices');
    }
}

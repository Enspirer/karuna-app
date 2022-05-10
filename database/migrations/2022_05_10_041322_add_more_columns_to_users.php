<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('user_type')->nullable()->after('email');
            $table->text('nic_number')->nullable()->after('email');
            $table->text('id_photo')->nullable()->after('email');
            $table->text('occupation')->nullable()->after('email');
            $table->text('address')->nullable()->after('email');
            $table->text('contact_number')->nullable()->after('email');
            $table->text('contact_number_two')->nullable()->after('email');
            $table->text('country')->nullable()->after('email');
            $table->text('city')->nullable()->after('email');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
            $table->dropColumn('nic_number');
            $table->dropColumn('id_photo');
            $table->dropColumn('occupation');
            $table->dropColumn('address');
            $table->dropColumn('contact_number');
            $table->dropColumn('contact_number_two');
            $table->dropColumn('country');
            $table->dropColumn('city');
        });
    }
}

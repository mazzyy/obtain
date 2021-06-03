<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('Name');
            $table->string('address');
            $table->string('contact');
            $table->string('CNIC')->nullable();
            $table->date('joiningDate')->nullable();
            $table->date('leavingDate')->nullable();
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
        Schema::dropIfExists('dealer_details');
    }
}

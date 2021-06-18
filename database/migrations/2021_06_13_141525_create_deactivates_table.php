<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeactivatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deactivates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('company_id');
            $table->string('Customer_id');
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->date('leavingDate');
            $table->string('type')->nullable();
            $table->integer('sublocality')->nullable();
            $table->string('leavingReasion')->nullable();
            $table->string('otherComments')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deactivates');
    }
}

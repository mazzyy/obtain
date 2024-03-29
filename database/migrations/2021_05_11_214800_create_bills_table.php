<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('year');
            $table->string('month');
            $table->date('fullDate')->nullable();
            $table->integer('netAmount');
            $table->integer('recevieAmount');
            $table->string('billStatus');
            $table->string('receviedBy');
            $table->foreignId('user_id')->constrained('users');
            $table->string('user_name');
            $table->string('companie_id');
            $table->string('billType');
            $table->string('sublocality');
            $table->string('address')->nullable();
            $table->string('sublocalityName')->nullable();
            $table->date('receivingDate')->nullable();
            $table->string('internetId');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');

            $table->bigInteger('company_id')->unsigned()->index()->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('Sublocality')->unsigned()->index()->nullable();

            $table->foreignId('users_id')->constrained('users');


            $table->string('address');
            $table->string('contact');
            $table->string('connectiontype');
            $table->date('installDate');
            $table->date('Recharge Date');
            $table->integer('installationAmount');
            $table->integer('otherAmount');
            $table->string('status');
            $table->string('connectionProvider');
            $table->string('Box Number');
            $table->string('internetPackage');
            $table->integer('internetPrice');
            $table->integer('internetdiscont');
            $table->string('cablePackage');
            $table->integer('cablePrice');
            $table->integer('cablediscount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connections');
    }
}

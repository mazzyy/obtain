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

            $table->foreignId('user_id')->constrained('users');

            $table->string('internetId');
            $table->string('address');
            $table->string('contact');
            $table->string('contact2')->nullable();
            $table->string('connectiontype');
            $table->date('installDate')->nullable();
            $table->date('rechargeDate');
            $table->integer('installationAmount');
            $table->integer('otherAmount')->nullable();
            $table->integer('wifiAmount')->nullable();
            $table->integer('wireAmount')->nullable();
            $table->string('status');
            $table->string('connectionProvider');
            $table->string('boxNumber');
            $table->string('internetPackage')->nullable();;
            $table->integer('internetPrice')->nullable();;
            $table->integer('internetdiscont')->nullable();;
            $table->string('cablePackage')->nullable();;
            $table->integer('cablePrice')->nullable();;
            $table->integer('cablediscount')->nullable();;

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

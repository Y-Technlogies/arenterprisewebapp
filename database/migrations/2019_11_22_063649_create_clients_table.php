<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('client_id');
            $table->string('clientsn');
            $table->string('companyname');
            $table->string('propname');
            $table->tinyInteger('propphone1')->unique();
            $table->tinyInteger('propphone2')->unique();
            $table->string('assistant');
            $table->tinyInteger('asstphone1')->unique();
            $table->tinyInteger('asstphone2')->unique();
            $table->tinyInteger('bussphone')->unique();
            $table->string('email')->unique();
            $table->string('destination');
            $table->string('transport');
            $table->string('shipping_address');
            $table->string('address');
            //$table->string('division');
           // $table->string('district');
           // $table->string('upazilla');
           // $table->string('union');
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
        Schema::dropIfExists('clients');       
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('agents_id');
            $table->string('agents_fname');
            $table->string('agents_lname');
            $table->string('agents_sn');
            $table->tinyInteger('agent_contact')->unique();
            $table->tinyInteger('agent_email')->unique();
            $table->string('salesdivision');
            $table->string('agentaddress');
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
        Schema::dropIfExists('agents');
    }
}

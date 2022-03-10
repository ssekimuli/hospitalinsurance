<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('policy');
            $table->integer('pateints_id')->unsigned();
            $table->integer('Company_ID')->unsigned();
            $table->string('start_Date');
            $table->string('End_Date');
            $table->string('deducted_amount');
            $table->timestamps();
            $table->foreign('pateints_id')->references('id')->on('pateints')->onDelete('cascade');
            $table->foreign('Company_ID')->references('id')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
}

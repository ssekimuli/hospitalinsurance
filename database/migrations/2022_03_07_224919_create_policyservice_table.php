<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policyservice', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')->unsigned();
            $table->integer('policy_id')->unsigned();
            $table->string('price');
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policyservice');
    }
}

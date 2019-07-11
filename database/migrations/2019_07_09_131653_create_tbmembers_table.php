<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmembers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('branchId')->unsigned()->index();
            $table->foreign('branchId')->references('id')->on('tbbranchs');
            $table->string('mbname');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('tbmembers');
    }
}

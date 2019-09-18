<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUberfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uberfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('profile');
            $table->string('flisence');
            $table->string('blisence');
            $table->string('fesh');
            $table->string('dlisence');
            $table->string('Uid');
            $table->rememberToken();
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
        Schema::dropIfExists('uberfiles');
    }
}

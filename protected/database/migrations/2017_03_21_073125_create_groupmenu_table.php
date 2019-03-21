<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupmenuTable extends Migration
{
    public function up()
    {
        Schema::create('trx_group_menu', function (Blueprint $table) {
            $table->integer('menu');
            $table->integer('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_group_menu');
    }
}

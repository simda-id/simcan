<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrxBatchProcessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_batch_process', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('tahun');
			$table->integer('batch_cat')->comment('Mengikuti kode modul');
			$table->integer('kd_perubahan')->nullable();
			$table->dateTime('mulai_pada')->nullable();
			$table->integer('row')->nullable();
			$table->dateTime('sukses_pada')->nullable();
			$table->boolean('blamable_cat')->nullable()->comment('1 untuk unit, 2 untuk sub unit');
			$table->integer('blamable_id')->nullable()->comment('Mengikuti kode unit/sub unit');
			$table->integer('user_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trx_batch_process');
	}

}

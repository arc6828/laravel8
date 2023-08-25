<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->timestamps();
			$table->string('remark')->nullable()->comment('หมายเหตุ');
			$table->float('vat_percent', 10, 0)->nullable()->default(7)->comment('อัตราภาษี %');
			$table->float('vat', 10, 0)->nullable()->default(0)->comment('vat');
			$table->float('sub_total', 10, 0)->nullable()->default(0)->comment('ราคาก่อนรวม vat');
			$table->float('net_total', 10, 0)->nullable()->default(0)->comment('ราคารวม');
			
			$table->integer('customer_id')->comment('รหัสลูกค้า');
			$table->integer('user_id')->comment('รหัสพนักงานขาย');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_quotation');
	}

}

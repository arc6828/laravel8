<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_details', function(Blueprint $table)
		{
			$table->increments('id');
            $table->timestamps();
			$table->integer('amount')->default(1)->comment('จำนวน');
			$table->float('price', 10, 0)->nullable()->comment('ราคาขาย (บาท)');
			$table->string('remark')->nullable()->default('');			
			$table->integer('quotation_id')->comment('เลขที่ใบเสนอราคา');
			$table->integer('product_id')->comment('รหัสสินค้า');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_quotation_detail');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();		
			$table->integer('name')->nullable()->default(555);
			$table->string('organization_name', 100)->nullable()->comment('ชื่อองค์กร');
			$table->text('address', 65535)->nullable()->comment('ที่อยู่');
			$table->string('phone', 100)->nullable()->comment('เบอร์โทรศัพท์');
			$table->string('email', 100)->nullable()->comment('อีเมล์');
			$table->string('remark')->nullable()->comment('หมายเหตุ');		
			$table->integer('user_id')->nullable()->default(1)->comment('รหัสพนักงานขาย');		
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_customer');
	}

}

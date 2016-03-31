<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebcontactWebContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webcontact__webcontacts', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->string('contact_name');
			$table->string('contact_phone');
			$table->string('contact_email');
			$table->string('contact_subject');
			$table->text('contact_message');
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
		Schema::drop('webcontact__webcontacts');
	}
}

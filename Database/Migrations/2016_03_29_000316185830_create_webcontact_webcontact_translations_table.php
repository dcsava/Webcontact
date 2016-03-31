<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebcontactWebContactTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webcontact__webcontact_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('webcontact_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['webcontact_id', 'locale']);
            $table->foreign('webcontact_id')->references('id')->on('webcontact__webcontacts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('webcontact__webcontact_translations');
	}
}

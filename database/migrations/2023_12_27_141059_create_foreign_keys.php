<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		// Schema::table('sections', function(Blueprint $table) {
		// 	$table->foreign('Grade_id')->references('id')->on('Grades')
		// 				->onDelete('cascade');
						
		// });
		
	
		Schema::table('my_parints', function(Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');
        });

		Schema::table('parentattachments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my_parints');
        });

	}

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});
		
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_Grade_id_foreign');
		});
		
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_Class_id_foreign');
		});
	}
}
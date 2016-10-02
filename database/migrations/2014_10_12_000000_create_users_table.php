<?php

use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('role',60);
            $table->string('itNumber',60);
			$table->rememberToken();
			$table->timestamps();
		});
		$data=array("name" =>"wijeram admin","email" =>"admin@gmail.com","password"=>bcrypt("admin123"),"role"=> "admin" );
		User::create($data);
        $data1=array("name" =>"Felix cashire","email" =>"cash@gmail.com","password"=>bcrypt("cash123"),"role"=> "cashire" );
        User::create($data1);
        $data2=array("name" =>"Sanchayan student","email" =>"student@gmail.com","password"=>bcrypt("student123"),'itNumber'=> 'IT13565477',"role"=> "student" );
        User::create($data2);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

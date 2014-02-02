<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::truncate();
		User::create([
			'username'=>'Vijay',
			'email'=>'astro.vijay@gmail.com',
			'password'=>'12345',
			'admin'=>TRUE
			]);
		User::create([
			'username'=>'Chetan',
			'email'=>'chetan@gmail.com',
			'password'=>'12345',
			'admin'=>'FALSE'
			]);

	}

}
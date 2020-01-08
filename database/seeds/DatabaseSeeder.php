<?php

use Illuminate\Database\Seeder;
use App\Method;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	Method::create([
    		'name' => 'Palawan Pawnshop',
    		'code' => 'PL'
    	]);

    	Method::create([
    		'name' => 'Paypal',
    		'code' => 'PP'
    	]);

    	Method::create([
    		'name' => '7/11',
    		'code' => 'CS'
    	]);

    	Method::create([
    		'name' => 'GCASH',
    		'code' => 'GC'
    	]);

    }
}

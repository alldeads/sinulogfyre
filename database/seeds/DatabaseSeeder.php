<?php

use Illuminate\Database\Seeder;
use App\Method;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name'     => 'John Rexter Flores',
            'email'    => 'johnrexter.flores@gmail.com',
            'password' => Hash::make('sinulogfyre!'),
            'token'    => uniqid()
        ]);

        User::create([
            'name'     => 'Miguel Fernan',
            'email'    => 'miguellufernan@yahoo.com',
            'password' => Hash::make('sinulogfyre!'),
            'token'    => uniqid()
        ]);

        Product::create([
            'name'     => 'VIP TICKET',
            'price'    => 1500,
            'quantity' => 1500,
            'brief'    => 'Access to VIP area on the 2nd floor of the open grounds party for a more exclusive feel.',
            'description' => 'Access to VIP area on the 2nd floor of the open grounds party for a more exclusive feel. Sinulog Fyre 2020 is an open grounds party featuring Deniz Koyu, Tiara Typinski, Shantidope & more.',
            'avatar_first' => 'images/81463729_377066763142641_7711675575957454848_n.jpg'
        ]);

        Product::create([
            'name'     => 'GA Ticket',
            'price'    => 900,
            'quantity' => 5000,
            'brief'    => 'General Admission access at the ground floor of the open grounds party.',
            'description' => 'General Admission access at the ground floor of the open grounds party. Sinulog Fyre 2020 is an open grounds party featuring Deniz Koyu, Tiara Typinski, Shantidope & more.',
            'avatar_first' => 'images/81327007_607665803322647_1180082083217801216_n.jpg'
        ]);

    }
}

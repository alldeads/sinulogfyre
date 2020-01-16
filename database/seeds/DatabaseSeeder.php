<?php

use Illuminate\Database\Seeder;
use App\Method;
use App\User;
use App\Product;
use App\Serial;
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

        Product::create([
            'name'     => 'Ground Floor Tables',
            'price'    => 30000,
            'quantity' => 5000,
            'brief'    => '<p>🔥Good for 12 pax🔥</p>
<p>* 12 VIP Tickets</p>
<p>* (1) Grey Goose 750ml</p>
<p>* (2) Bacardi Gold</p>
<p>* (10) Redbull</p>
<p>* (5) 1.5L Coke</p>
<p>* (1) Whole Lechon</p>',
            'description' => '<ul class="list">
                                <li> 🔥Good for 12 pax🔥</li>
                                <li> 12 VIP Tickets</li>
                                <li> (1) Grey Goose 750ml</li>
                                <li> (2) Bacardi Gold</li>
                                <li> (10) Redbull</li>
                                <li> (5) 1.5L Coke</li>
                                <li> (1) Whole Lechon</li>
                            </ul>',
            'avatar_first' => 'images/82253736_2277616679006372_555321284049764352_n.jpg'
        ]);

        Product::create([
            'name'     => 'Second Floor Tables',
            'price'    => 30000,
            'quantity' => 5000,
            'brief'    => '<p>🔥Good for 12 pax🔥</p>
<p>* 12 VIP Tickets</p>
<p>* (1) Grey Goose 750ml</p>
<p>* (2) Bacardi Gold</p>
<p>* (10) Redbull</p>
<p>* (5) 1.5L Coke</p>
<p>* (1) Whole Lechon</p>',
            'description' => '<ul class="list">
                                <li> 🔥Good for 12 pax🔥</li>
                                <li> 12 VIP Tickets</li>
                                <li> (1) Grey Goose 750ml</li>
                                <li> (2) Bacardi Gold</li>
                                <li> (10) Redbull</li>
                                <li> (5) 1.5L Coke</li>
                                <li> (1) Whole Lechon</li>
                            </ul>',
            'avatar_first' => 'images/83062936_482361212474147_2866091368076279808_n.jpg'
        ]);

        Variation::create([
            'name' => ''
        ]);


        // for ( $i = 1; $i < 4001; $i++ ) {

        //     $serial = Serial::generate_serial_number();

        //     Serial::create([
        //         'number' => $serial,
        //         'status' => 'available'
        //     ]);
        // }
    }
}

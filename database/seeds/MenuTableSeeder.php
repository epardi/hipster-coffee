<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'name' => 'caffe-latte',
            'description' => 'Fresh brewed coffee and steamed milk',
            'price' => 2.95,
            'is_new' => true,
        ]);
        DB::table('menu')->insert([
            'name' => 'caffe-mocha',
            'description' => 'Espresso With Milk, and Whipped Cream',
            'price' => 3.67,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'white-chocolate-mocha',
            'description' => 'Espresso, White Chocolate, Milk, Ice and Cream',
            'price' => 2.79,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'caffe-americano',
            'description' => 'Espresso Shots and Light Layer of Crema',
            'price' => 3.06,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'cappuccino',
            'description' => 'Espresso, and Smoothed Layer of Foam',
            'price' => 4.03,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'vanilla-latte',
            'description' => 'Espresso Milk With Flavor,and Cream',
            'price' => 3.65,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'iced-gingerbread-latte',
            'description' => 'Espresso, Milk, Ice, and Gingerbread Flavor',
            'price' => 3.92,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'iced-caffe-mocha',
            'description' => 'Espresso, bittersweet mocha sauce, milk and ice',
            'price' => 2.60,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'iced-caramel-latte',
            'description' => 'Espresso, Milk, Ice and Caramel Sauce',
            'price' => 4.67,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'espresso-macchiato',
            'description' => 'Rich Espresso With Milk and Foam',
            'price' => 2.98,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'caramel-macchiato',
            'description' => 'Espresso, vanilla-flavored syrup and milk',
            'price' => 2.54,
            'is_new' => false,
        ]);
        DB::table('menu')->insert([
            'name' => 'iced-smoked-latte',
            'description' => 'Espresso, ice, with smoked butterscotch',
            'price' => 3.05,
            'is_new' => true,
        ]);
    }
}

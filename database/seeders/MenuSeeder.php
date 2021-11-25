<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'title' => 'HOME',
                'parent_id' => null,
                'url' => ''

            ],
            [
                'title' => 'DRESSES',
                'parent_id' => null,
                'url' => '#'
            ],
            [
                'title' => 'SHOES',
                'parent_id' => null,
                'url' => '#'
            ],
            [
                'title' => 'CONTACT',
                'parent_id' => null,
                'url' => 'contact'
            ],
            [
                'title' => 'PAGES',
                'parent_id' => null,
                'url' => '#'
            ],
            [
                'title' => 'HOME',
                'parent_id' => 5,
                'url' => ''
            ],
            [
                'title' => 'SHOP',
                'parent_id' => 5,
                'url' => 'shop'
            ],
            [
                'title' => 'PRODUCT DETAILS',
                'parent_id' => 5,
                'url' => 'product-details'
            ],
            [
                'title' => 'CART',
                'parent_id' => 5,
                'url' => 'cart'
            ],
            [
                'title' => 'CHECKOUT',
                'parent_id' => 5,
                'url' => 'checkout'
            ]
        ]);
    }
}

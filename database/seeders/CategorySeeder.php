<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'all'

            ],
            [
                'category_name' => 'woman'
            ],
            [
                'category_name' => 'men',
            ],
            [
                'category_name' => 'accessories',
            ],
            [
                'category_name' => 'shoes'
            ],
            [
                'category_name' => 'kids',
            ]
        ]);
    }
}

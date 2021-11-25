<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $inputImg = [
            'product-1',
            'product-2',
            'product-3',
            'product-4',
            'product-5',
            'product-6',
            'product-7',
            'product-8',
            'product-9',
            'product-10',
            'product-11',
            'product-12'
        ];


        $randKeys = array_rand($inputImg);
        $inputRandImgValue = $inputImg[$randKeys];

        $inputCategoryId = [2, 3, 4, 5, 6];

        $randKeys = array_rand($inputCategoryId);
        $inputRandCategoryValue = $inputCategoryId[$randKeys];

        $min = 0;
        $max = 3000;

        $randInputColorSize = [0, 1, 2, 3, 4, 5];
        $randKeys = array_rand($randInputColorSize);
        $inputRandColorSizeValue = $randInputColorSize[$randKeys];

        return [
            'img' => $inputRandImgValue,
            'description' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'category_id' => $inputRandCategoryValue,
            'price' => rand($min, $max),
            'color' => $inputRandColorSizeValue,
            'size' => $inputRandColorSizeValue
        ];
    }
}

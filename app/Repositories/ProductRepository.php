<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\View\Components\CardSection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Product::class;
    }

    public function getProducts($categoryId) {
        $products = null;

        if(!$categoryId) {
            throw new \Exception('Request value is empty');
        } elseif($categoryId == 1) {
            $products = Product::all()->take(6);
        } else {
            $categoriesWithProducts = Category::with('products')
                ->where('id','=', $categoryId)->first();
            $products = $categoriesWithProducts->products->take(6);
        }

        $comp = new CardSection($products);

        return $comp->render();
    }
}

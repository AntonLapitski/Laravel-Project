<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $menu;
    protected $category;
    protected $productRepository;

    public function __construct(MenuRepository $menu, CategoryRepository $category, ProductRepository $productRepository)
    {
        $this->menu = $menu;
        $this->category = $category;
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menuData = $this->menu->getMenuData();
        $categories = $this->category->getAllCategories();
        $products = Product::all()->take(6);

        return view(
            'home',
            [
                'mainMenuItems'  => $menuData['mainMenuItems'],
                'dropDownValue'  => $menuData['dropDownValue'],
                'innerMenuItems' => $menuData['innerMenuItems'],
                'categories'     => $categories,
                'products'         =>  $products
            ]
        );
    }

    public function getProductsByCategory(Request $request)
    {
        $categoryId = $request->get('id');
        $error = null;

        try {
            return $this->productRepository->getProducts($categoryId);
        } catch (\Exception $e) {
            $error =  $e->getMessage();
        }

        return $error;
    }
}

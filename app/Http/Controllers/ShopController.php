<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\MenuRepository;
use App\View\Components\CardSectionWithPagination;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    protected $menu;

    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menuData = $this->menu->getMenuData();
        $products = DB::table('products')->paginate(9);
        $categories = Category::select('id', 'category_name')->where('id', '!=', 1)->get();

        return view(
            'shop',
            [
                'mainMenuItems'  => $menuData['mainMenuItems'],
                'dropDownValue'  => $menuData['dropDownValue'],
                'innerMenuItems' => $menuData['innerMenuItems'],
                'products'       => $products,
                'categories'     => $categories
            ]
        );
    }

    public function getPaginated(ProductFilter $productFilter)
    {
        if($productFilter->request->ajax())
        {
            $products = Product::filter($productFilter)
                ->paginate(9, ['*'], 'page', $productFilter->request->get('page'));
            $comp = new CardSectionWithPagination($products);

            return $comp->render();
        }
    }


    public function getFilteredData(ProductFilter $productFilter)
    {
        if($productFilter->request->ajax()) {
            $products = Product::filter($productFilter)->paginate(9);
            $comp = new CardSectionWithPagination($products);

            return $comp->render();
        }
    }
}

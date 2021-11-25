<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;

class ProductDetailsController extends Controller
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
        $result = $this->menu->getMenuData();

        return view(
            'product-details',
            [
                'mainMenuItems'  => $result['mainMenuItems'],
                'dropDownValue'  => $result['dropDownValue'],
                'innerMenuItems' => $result['innerMenuItems']
            ]
        );
    }
}

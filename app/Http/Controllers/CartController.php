<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;

class CartController extends Controller
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
            'cart',
            [
                'mainMenuItems'  => $result['mainMenuItems'],
                'dropDownValue'  => $result['dropDownValue'],
                'innerMenuItems' => $result['innerMenuItems']
            ]
        );
    }
}

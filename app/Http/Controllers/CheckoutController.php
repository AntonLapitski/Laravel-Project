<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Repositories\MenuRepository;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
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
            'checkout',
            [
                'mainMenuItems'  => $result['mainMenuItems'],
                'dropDownValue'  => $result['dropDownValue'],
                'innerMenuItems' => $result['innerMenuItems']
            ]
        );
    }

    public function placeOrder(CheckoutRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return $request->failedValidation($validator);
        } else {
            return json_encode(['validation' => 'success']);
        }
    }
}

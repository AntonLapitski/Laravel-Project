<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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
        return view(
            'contact',
            [
                'mainMenuItems'  => $menuData['mainMenuItems'],
                'dropDownValue'  => $menuData['dropDownValue'],
                'innerMenuItems' => $menuData['innerMenuItems']
            ]
        );
    }

    public function contactSubmit(ContactRequest $request)
    {
        $menuData = $this->menu->getMenuData();

        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return redirect()->route('contact');
        } else {
            session()->flash('msg', 'Successfully done the operation.');
            return redirect()->route('contact');
        }
    }
}

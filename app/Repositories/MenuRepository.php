<?php

namespace App\Repositories;

use App\Models\Menu;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class MenuRepository.
 */
class MenuRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Menu::class;
    }

    public function getMenuData()
    {
        $mainMenuItems = Menu::where('parent_id', '=', null)->get();
        $dropDownValue = $mainMenuItems[count($mainMenuItems) - 1]->title;
        $menuId = Menu::whereNotNull('parent_id')->first()->parent_id;
        $innerMenuItems = Menu::find($menuId)->childs()->get();

        return [
            'mainMenuItems' => $mainMenuItems,
            'dropDownValue' => $dropDownValue,
            'innerMenuItems' => $innerMenuItems
        ];
    }
}

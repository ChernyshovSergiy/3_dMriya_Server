<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Menus\ValidateRequest;
use App\Models\Menu;
use App\Services\JsonService;
use App\Services\LanguagesService;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MenusController extends Controller
{
    public $model;
    public $json;
    public $languages;

    public function __construct(
        Menu $menu,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $menu;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $menu_points = $this->json->build($this->model, 'title');
        $menu_blocks = $this->model->getTextColumnsForTranslate();
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.menus.index',
            compact('menu_points', 'locale', 'menu_blocks'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $page_names = $this->model::getMenuPointName();
        $menu_blocks = $this->model->getTextColumnsForTranslate();
        $default_sort_number = $this->model->maxSortNumber();

        return view('admin.menus.create',
            compact('page_names', 'languages',
                    'menu_blocks', 'default_sort_number'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model::addMenuPoint($request);

        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $menu_point = $this->json->build($this->model, 'title')->find($id);
        $page_names = $this->model::getMenuPointName();
        $menu_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.menus.edit', compact(
            'menu_point',
            'page_names', 'languages', 'menu_blocks'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model::editMenuPoint($request, $id);

        return redirect()->route('menus.index');
    }

    public function destroy($id)
    {
        $this->model::removeMenuPoint($id);

        return redirect()->route('menus.index');
    }

    public function toggle($id)
    {
        $this->model->toggleActive($id);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Languages\ValidateRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public $model;

    public function __construct(Language $language)
    {
        $this->model = $language;
    }

    public function index()
    {
        $languages = $this->model::all();

        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addNewLanguage($request);

        return redirect()->route('languages.index');
    }

    public function edit($id)
    {
        $language = $this->model::find($id);

        return view('admin.languages.edit',
            compact('language'));
    }

    public function update(Request $request, $id)
    {
        $this->model->editLanguage($request, $id);

        return redirect()->route('languages.index');
    }

    public function destroy($id)
    {
        $this->model->removeLanguage($id);

        return redirect()->route('languages.index');
    }

    public function toggle($id)
    {
        $this->model->toggleActive($id);

        return redirect()->back();
    }
}

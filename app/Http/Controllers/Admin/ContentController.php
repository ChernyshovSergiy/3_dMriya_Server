<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contents\ValidateRequest;
use App\Models\Content;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContentController extends Controller
{
    public $model;
    public $languages;
    public $json;

    public function __construct(
        Content $content,
        LanguagesService $languagesService,
        JsonService $jsonService)
    {
        $this->model = $content;
        $this->languages = $languagesService;
        $this->json = $jsonService;
    }
    public function index()
    {
        $contents = $this->json->build($this->model ,'content');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.contents.index', compact('contents', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.contents.create', compact(
            'languages',  'text_blocks'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addContent($request);

        return redirect()->route('contents.index')
            ->with('status', 'success');
    }

    public function edit($id)
    {
        $content = $this->json->build($this->model ,'content')->find($id);
        $languages = $this->languages->getActiveLanguages();
        $text_blocks = $this->model->getTextColumnsForTranslate();

        return view('admin.contents.edit', compact(
            'content','languages', 'text_blocks'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editContent($request, $id);

        return redirect()->route('contents.index')
            ->with('message', 'contents update successful');
    }

    public function destroy($id)
    {
        $this->model->removeContent($id);

        return redirect()->route('contents.index')
            ->with('message', 'content delete successful');
    }


    public function toggle($id)
    {
        $this->model->toggleActive($id);

        return redirect()->back();
    }
}

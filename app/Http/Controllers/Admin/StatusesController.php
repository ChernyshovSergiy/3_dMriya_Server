<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Statuses\ValidateRequest;
use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use App\Services\LanguagesService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StatusesController extends Controller
{
    public $model;
    public $json;
    public $languages;

    public function __construct(
        Status $status,
        JsonService $jsonService,
        LanguagesService $languagesService
    )
    {
        $this->model = $status;
        $this->json = $jsonService;
        $this->languages = $languagesService;
    }
    public function index()
    {
        $statuses = $this->json->build($this->model, 'title');
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.statuses.index', compact('statuses', 'locale'));
    }

    public function create()
    {
        $languages = $this->languages->getActiveLanguages();
        return view('admin.statuses.create',
            compact('languages'));
    }

    public function store(ValidateRequest $request)
    {
        $this->model->addNewStatus($request);

        return redirect()->route('statuses.index')
            ->with('status', 'success');
    }

    public function edit($id)
    {
        $languages = $this->languages->getActiveLanguages();
        $status = $this->json->build($this->model, 'title')->find($id);

        return view('admin.statuses.edit',
            compact('languages', 'status'));
    }

    public function update(ValidateRequest $request, $id)
    {
        $this->model->editStatus($request, $id);

        return redirect()->route('statuses.index')
            ->with('message', 'status update successful');
    }

    public function destroy($id)
    {
        $this->model->removeStatus($id);

        return redirect()->route('statuses.index')
            ->with('message', 'status delete successful');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Order\Modeling\ValidateAdminRequest;
use App\Http\Requests\Order\Modeling\ValidateRequest;
use App\Models\Modeling;
use App\Models\Status;
use App\Models\User;
use App\Services\LanguagesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelingOrderController extends Controller
{
    public $model;
    public $status;
    public $language;
    public $executor;

    public function __construct(
        Modeling $modeling,
        Status $status,
        LanguagesService $language,
        User $user
    )
    {
        $this->model = $modeling;
        $this->status = $status;
        $this->language = $language;
        $this->executor = $user;
    }

    public function index()
    {
        $confirm_orders = $this->model::getConfirmModelingOrders();

        return view('admin.modeling.index', compact('confirm_orders'));
    }

    public function create()
    {
        $statuses = $this->status->getStatuses();
        $languages = $this->language->getLanguages();
        $executors = $this->executor->getExecutors();

        return view('admin.modeling.create',
            compact('statuses', 'languages', 'executors'));
    }

    public function store(ValidateAdminRequest $request)
    {
        $this->model::adminAddNewModelingOrder($request);

        return redirect()->route('modelings.index');
    }

    public function edit($id)
    {
        $modeling_order = $this->model::find($id);
        $statuses = $this->status->getStatuses();
        $languages = $this->language->getLanguages();
        $executors = $this->executor->getExecutors();

        return view('admin.modeling.edit',
            compact('modeling_order', 'statuses', 'languages', 'executors'));
    }

    public function update(ValidateAdminRequest $request, $id)
    {
        $this->model->editModelingOrder($request, $id);

        return redirect()->route('modelings.index')
            ->with('message', 'modeling order update successful');
    }

    public function destroy($id)
    {
        $this->model->removeOrder($id);

        return redirect()->route('modelings.index')
            ->with('message', 'modeling order delete successful');
    }
}

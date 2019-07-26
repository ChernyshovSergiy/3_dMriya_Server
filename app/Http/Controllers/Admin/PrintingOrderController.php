<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Order\Printing\ValidateAdminRequest;
use App\Models\Country;
use App\Models\Printing;
use App\Models\Status;
use App\Models\User;
use App\Services\LanguagesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintingOrderController extends Controller
{
    public $model;
    public $status;
    public $language;
    public $executor;
    public $countries;

    public function __construct(
        Printing $printing,
        Status $status,
        LanguagesService $language,
        User $user,
        Country $countries
    )
    {
        $this->model = $printing;
        $this->status = $status;
        $this->language = $language;
        $this->executor = $user;
        $this->countries = $countries;
    }

    public function index()
    {
        $confirm_orders = $this->model::getConfirmPrintingOrders();

        return view('admin.printing.index', compact('confirm_orders'));
    }

    public function create()
    {
        $countries = $this->countries->getAdminCountries();
        $statuses = $this->status->getStatuses();
        $languages = $this->language->getLanguages();
        $executors = $this->executor->getExecutors();

        return view('admin.printing.create',
            compact('statuses', 'countries', 'languages', 'executors'));
    }

    public function store(ValidateAdminRequest $request)
    {
        $this->model::adminAddNewPrintingOrder($request);

        return redirect()->route('printings.index');
    }

    public function edit($id)
    {
        $printing_order = $this->model::find($id);
        $statuses = $this->status->getStatuses();
        $languages = $this->language->getLanguages();
        $executors = $this->executor->getExecutors();

        return view('admin.printing.edit',
            compact('printing_order', 'statuses', 'languages', 'executors'));
    }

    public function update(ValidateAdminRequest $request, $id)
    {
        $this->model->editPrintingOrder($request, $id);

        return redirect()->route('printings.index')
            ->with('message', 'printing order update successful');
    }

    public function destroy($id)
    {
        $this->model->removeOrder($id);

        return redirect()->route('printings.index')
            ->with('message', 'printing order delete successful');
    }
}

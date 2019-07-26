<?php

namespace App\Http\Controllers\api\Orders;

use App\Http\Requests\Order\Printing\ValidateRequest;
use App\Models\Printing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class PrintingOrderController extends Controller
{
    public $model;

    public function __construct(Printing $printing)
    {
        $this->model = $printing;
    }

    public function store(ValidateRequest $request)
    {
        $this->model::addNewPrintingOrder($request);
        return response()->json([
            'massage' => 'Order for Printing delivered'
        ]);
    }

    public function verify($token)
    {
        $this->model->verifyPrintingOrder($token);

        return response()->json([
            'status' => Lang::get('mail.your_order_is_confirmed')
        ]);
    }
}

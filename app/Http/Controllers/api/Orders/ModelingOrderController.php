<?php

namespace App\Http\Controllers\api\Orders;

use App\Http\Requests\Order\Modeling\ValidateRequest;
use App\Models\Modeling;
use App\Http\Controllers\Controller;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ModelingOrderController extends Controller
{
    public $model;

    public function __construct(Modeling $modeling)
    {
        $this->model = $modeling;
    }

    public function store(ValidateRequest $request)
    {
        $this->model::addNewModelingOrder($request);
        return response()->json([
            'massage' => 'Order for Modeling delivered'
        ]);
    }

    public function verify($token)
    {
//        $corToken = substr($token, 0, -2);
//        $language = substr($token, -2);
//        LaravelLocalization::setLocale($language);
        $this->model->verifyModelingOrder($token);
//        $this->model->verifyModelingOrder($corToken);

//        return redirect('/')->with('status', Lang::get('mail.your_order_is_confirmed'));
        return response()->json([
            'status' => Lang::get('mail.your_order_is_confirmed')
        ]);
    }
}

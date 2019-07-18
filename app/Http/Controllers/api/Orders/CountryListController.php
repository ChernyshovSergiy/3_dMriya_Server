<?php

namespace App\Http\Controllers\api\Orders;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryListController extends Controller
{
    public $model;

    public function __construct(Country $country)
    {
        $this->model = $country;
    }
    public function index(Request $request)
    {
        $countries = $this->model->getCountryListByLanguages($request);

        return response()->json([
            'success' => true,
            'data' => $countries
        ]);
    }
}

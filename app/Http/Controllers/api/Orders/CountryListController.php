<?php

namespace App\Http\Controllers\api\Orders;

use App\Models\Country;
use App\Models\Zippopotam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryListController extends Controller
{
    public $model;
    public $mask;

    public function __construct(Country $country, Zippopotam $mask)
    {
        $this->model = $country;
        $this->mask = $mask;
    }
    public function index(Request $request)
    {
        $countries = $this->model->getCountryListByLanguages($request);

        return response()->json([
            'success' => true,
            'data' => $countries
        ]);
    }
    public function mask(Request $request)
    {
        $masks = $this->mask->getCountryZipCodeMask($request);
        return response()->json([
            'success' => true,
            'data' => $masks
        ]);
    }
}

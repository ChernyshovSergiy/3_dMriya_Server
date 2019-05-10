<?php

namespace App\Http\Controllers\api\Pages;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class languagesController extends Controller
{
    public $model;

    public function __construct(Language $language)
    {
        $this->model = $language;
    }

    public function index()
    {
        return response()->json([
            'message' => 'languages list',
            'data' => $this->model->getActivePoints()
        ]);
    }
}

<?php

namespace App\Http\Controllers\api\Pages;

use App\Models\Content;
use App\Http\Controllers\Controller;
use App\Services\JsonService;
use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    public $model;
    public $json;

    public function __construct(Content $content, JsonService $jsonService)
    {
        $this->model = $content;
        $this->json = $jsonService;
    }

    public function index()
    {
        $contents = $this->json->build($this->model ,'content');
        $modelis = $this->model::all();
        return response()->json([
            'massage' => 'Data contents delivered',
//            'data' => $this->model->getActivePointsIdTitle()
            'data' => $contents->flatten()->keyBy('title')->all()
        ]);
    }

    public function content(Request $request){
        $curLang = $request->get('language');
        $contents = $this->json->buildOneLang($this->model ,'content', $curLang, 'title');
        return response()->json([
            'massage' => 'Data contents delivered',
            'data' => $contents
        ]);
    }

}

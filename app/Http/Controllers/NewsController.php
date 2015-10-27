<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\News;
//use App\Contracts\News;

class NewsController extends Controller
{

    // protected $news;

    // public function __construct(News $news) {
    //     $this->news = $news;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return News::allAble();
    }

    // public function index()
    // {
    //     return $this->news->allAble();
    // }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\News;
//use App\Contracts\News;

class NewsController extends Controller
{

    protected $news;

    public function __construct(News $news) {
        $this->news = $news;
    }

    public function index()
    {
        return News::allAble();
    }

    public function store(Reqeust $request)
    {

    }
    

    public function create() 
    {

        
    }

}

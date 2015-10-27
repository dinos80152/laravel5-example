<?php

use App\Contracts\News;

class EloquentNewsReposity implements News
{
    public function allAble()
    {
        return News::where('status', 1)->all();
    }
}
<?php

use App\Contracts\News;
use Redis;

class RedisNewsReposity implements News
{
    public function allAble()
    {
        $news = Redis::keys('news:*');
        return $news->filter(function ($news_element) {
            return $news_element->status === 1;
        });
    }
}
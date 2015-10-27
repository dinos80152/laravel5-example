<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function allAble() {
        return $this->where('status', 1)->get();
    }
}

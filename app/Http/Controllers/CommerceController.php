<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommerceController extends Controller
{
    public function processOrder(Request $request, $id)
    {

        //Dispatching Jobs From Requests
        $this->dispatchFrom('App\Jobs\ProcessOrder', $request);

        //Dispatching Jobs From Requests And Array
        $this->dispatchFrom('App\Jobs\ProcessOrder', $request, [
            'taxPercentage' => 20,
        ]);
    }
}
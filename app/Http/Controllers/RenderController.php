<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RenderController extends Controller
{

    protected $categories;

    public function __construct()
    {
        $this->categories = json_decode(file_get_contents(public_path('data/categories.json')));
    }

    public function react()
    {
        return view('render.react');
    }

    public function categories()
    {
        return response()->json($this->categories);
    }

    public function php()
    {
        $mobileCategories = array_values(array_filter($this->categories, function($category) {
            return $category->game_type === "mobile";
        }));

        return view('render.php', compact('mobileCategories'));
    }
}

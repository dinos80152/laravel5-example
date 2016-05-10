<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RenderController extends Controller
{
    public function react()
    {
        return view('render.react');
    }

    public function categories()
    {
        $categories = json_decode(file_get_contents(storage_path('app/category.json')));
        return response()->json($categories);
    }

    public function php()
    {
        $categories = json_decode(file_get_contents(storage_path('app/category.json')));

        $categories = array_values(array_filter($categories, function($category) {
            return $category->game_type === "mobile";
        }));

        return view('render.php', compact('categories'));
    }
}

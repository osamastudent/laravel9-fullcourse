<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function category()
    {
        return view('category');
    }

    public function addcategory(Request $req)
    {
        $req->validate([
            'name' => 'required'
        ]);
        $data = $req->all();
        category::create($data);
        return back()->with('status', 'new category has added');
    }
}

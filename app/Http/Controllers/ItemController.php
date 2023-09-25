<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request){
        return Item::create($request->all());
    }
}

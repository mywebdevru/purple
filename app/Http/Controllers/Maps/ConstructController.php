<?php

namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConstructController extends Controller
{
    public function map_constructor() {
        return view('maps.map_constructor');
    }
}

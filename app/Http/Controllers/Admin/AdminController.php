<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index() {
        $properties = Property::paginate(5);

        return view('admin.properties.index', compact('properties'));
    }

    
}

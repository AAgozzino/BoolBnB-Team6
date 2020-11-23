<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class TestController extends Controller
{
    public function index()
    {
        $service = Service::all();
        // dd($service);
        return view('test', compact('service'));
    }
}

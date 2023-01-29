<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZipCode;

class QuoteController extends Controller
{
    public function index()
    {
        $zipcodes=ZipCode::all();
        return view('admin.quote.new',compact('zipcodes'));
    }
}

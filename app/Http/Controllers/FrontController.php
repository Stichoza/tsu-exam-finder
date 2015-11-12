<?php

namespace App\Http\Controllers;

use Smalot\PdfParser\Parser as PdfParser;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        return view('index');
    }
}

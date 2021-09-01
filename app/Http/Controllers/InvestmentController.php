<?php

namespace App\Http\Controllers;

class InvestmentController extends Controller
{
    public function index()
    {
        return view('investments.index');
    }
}

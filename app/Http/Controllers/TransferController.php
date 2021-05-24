<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('pages.transfer.index');
    }
}

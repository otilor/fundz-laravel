<?php

namespace App\Http\Controllers;

use App\Classes\RetrieveSafeLocks;
use Illuminate\Http\Request;

class NamedWalletsController extends Controller
{
    public function index()
    {
        return RetrieveSafeLocks::class;
    }
}

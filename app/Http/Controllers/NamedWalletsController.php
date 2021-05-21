<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamedWalletsController extends Controller
{
    public function inde()
    {
        return RetrieveSafeLocks::class;
    }
}

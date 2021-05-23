<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateSafelockRequest;
use Illuminate\Support\Str;

class SafelockController
{
    public function index()
    {
        return view('pages.safelock.index');
    }


    public function create()
    {
        return view('pages.safelock.create');
    }

    public function store(CreateSafelockRequest $request)
    {
        auth()->user()->createWallet([
            'name' => $request->wallet_name,
            'slug' => Str::slug('name')
        ]);

        session()->flash('success', 'Created new safelock');
        return back();
    }
}

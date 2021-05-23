<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateSafeolockRequest;
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

    public function store(CreateSafeolockRequest $request)
    {
        auth()->user()->createWallet([
            'name' => $request->wallet_name,
            'slug' => Str::slug('name')
        ]);

        session()->flash('success', 'Created new safelock');
        return back();
    }
}

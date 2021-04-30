<?php


namespace App\Http\Controllers;


use App\Http\Request\SaveMoneyRequest;
use App\Repositories\UserRepository;

class SavingsController extends Controller
{
    public function __construct(public UserRepository $user)
    {
    }

    public function index()
    {
        return view('pages/savings');
    }

    public function save(SaveMoneyRequest $request)
    {
        $this->user->topupWallet(userId: auth()->id(), amount: $request->amount);
        return redirect(route('dashboard-overview-1'));
    }
}

<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateSafelockRequest;
use App\Models\Safelock;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SafelockController
{
    public function __construct(public UserRepository $user)
    {

    }
    public function index()
    {
        $safelocks = $this->user->getUserSafelocks(auth()->user()->id);
        $safelocks = $safelocks['safelock'];
        // dd(md5(microtime()));
        return view('pages.safelock.index', compact('safelocks'));
    }


    public function create()
    {
        return view('pages.safelock.create');
    }

    public function lock(CreateSafelockRequest $request){
        $createsafelock = $this->user->createSafelock($request);
        if($createsafelock['status'] == true) {
            $this->user->withdraw($request->input('amount'), auth()->user()->id);
            session()->flash('success', $createsafelock['message']);
            return back();
        }
        else{
            session()->flash('error', $createsafelock['message']);
            return back();
        }
        
    }

    // Function to find safelock
    public function find(Request $request)
    {
        $safelock = Safelock::findOrFail($request->id);
        dd($safelock);
    }
    // public function store(CreateSafelockRequest $request)
    // {
    //     auth()->user()->createWallet([
    //         'name' => $request->wallet_name,
    //         'slug' => Str::slug('name')
    //     ]);

    //     session()->flash('success', 'Created new safelock');
    //     return back();
    // }
}

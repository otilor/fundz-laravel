<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateSafelockRequest;
use App\Http\Requests\TopupRequest;
use App\Repositories\SafelockRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Activitylog\Facades\CauserResolver;

class SafelockController
{
    public function __construct(public UserRepository $user, public SafelockRepository $safelock)
    {

    }
    public function index()
    {
        $safelocks = $this->user->getUserSafelocks(auth()->user()->id);
        $safelocks = $safelocks['safelock'];
        return view('pages.safelock.index', compact('safelocks'));
    }


    public function create()
    {
        return view('pages.safelock.create');
    }

    public function lock(CreateSafelockRequest $request){
        $createsafelock = $this->safelock->createSafelock($request->toArray());
        if($createsafelock['status'] == true) {
            $this->user->withdraw($request->input('amount'), auth()->user()->id);
            // Log the activity
            CauserResolver::setCauser($this->user->getUser(auth()->id()));
            activity()
                ->withProperty('created_at', now())
                ->log("Create Safelock '{$request->name}' with initial deposit of ₦{$request->amount}");

            session()->flash('success', $createsafelock['message']);
            return redirect('safelock');
        }
        else{
            session()->flash('error', $createsafelock['message']);
            return redirect('safelock');
        }
        
    }

    public function topup(TopupRequest $request)
    {
        $topup = $this->user->topupSafelock($request->safelock_id, $request->amount);
        if($topup['status'] == true) {
            $this->user->withdraw($request->input('amount'), auth()->user()->id);
            CauserResolver::setCauser($this->user->getUser(auth()->id()));
            activity()
                ->withProperty('created_at', now())
                ->log("Topped up '{$request->name}' Safelock  with deposit of ₦{$request->amount}");

            session()->flash('success', $topup['message']);
            return redirect('safelock');
        }
        else{
            session()->flash('error', $topup['message']);
            return back();
        }
    }

    public function cashout(Request $request)
    {
        $this->user->topupWallet($request->amount, auth()->user()->id); 
        $deletesafelock = $this->user->deletesafelock($request->safelock_id);
        if($deletesafelock['status'])
        {
            CauserResolver::setCauser($this->user->getUser(auth()->id()));
            activity()
                ->withProperty('created_at', now())
                ->log("Cashed out ₦{$request->amount} from '{$request->name}'");
            return redirect()->back()->with('success', $deletesafelock['message']);
        }
        else
        {
            return redirect()->back()->with('error', $deletesafelock['message']);
        }
    }
    
}

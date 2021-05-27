<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login/main', [
            'layout' => 'login'
        ]);
    }

    public function RegisterView(Request $request)
    {
        if($request->ref){
            session(['ref_by' => $request->ref]);
        }
        return view('register/main', [
            'layout' => 'login',
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }


    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }

    public function register(RegisterRequest $request)
    {
        $register = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'referred_by' => session('ref_by'),
            'active' => 1,
        ]);

        if($register)
        {
            if(session('ref_by'))
            {
                $referred_by = User::select('referral_earning')->where('affiliate_id',session('ref_by'))->first();
                $referred_by = $referred_by->referral_earning + 1000;
                $updateReferralEarnings = User::where('affiliate_id',session('ref_by'))->update([
                    'referral_earning' => $referred_by,
                ]);
                session()->forget('ref_by');
            }
            session()->flash('success', 'Registration successful, Now Login');
            return redirect('/login');
        }
        else{
            session()->flash('error','Registration Failed');
            return redirect()->back();
        }
    }
}

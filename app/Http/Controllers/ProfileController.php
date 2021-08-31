<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Mail\SendReminderMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('pages/profile');
    }

    public function updatePersonalInformation(Request $request)
    {
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = time().'.'.$extension;
            // dd($fileNameToStore);
            $path = $request->file('photo')->storeAs('public/image', $fileNameToStore);

        }
        // Else add a dummy image
        else {
        $dummyImage = 'profile-14.jpg';
        }
        User::where('id',auth()->user()->id)->update([
            'phone_number' => $request->phone_number,
            'photo' => $fileNameToStore ?? auth()->user()->photo,
        ]);

        session()->flash('sussess','Profile Updated Successfully!!!');
        return back();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $newPassword = Hash::make($request->new_pass);
        $changePassword = auth()->user()->update([
            'password' => $newPassword,
        ]);

        if($changePassword == true)
        {
            session()->flash('success',"Password Changed successfully!!!, Now Re-login");
            Auth::logout();
            return redirect('/login');
        }
        else
        {
            session()->flash('error',"Password failed to change");
            return back();
        }
    }
    public function send()
    {
        $users = User::whereemail_verified_at(null)->get();
        $data = [
            'users' => $users,
        ];
        // mail to each user
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendReminderMail($user));
        }
    }
}

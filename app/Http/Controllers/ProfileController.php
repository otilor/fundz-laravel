<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('pages/profile', compact('user'));
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
        return redirect()->back();
    }
}

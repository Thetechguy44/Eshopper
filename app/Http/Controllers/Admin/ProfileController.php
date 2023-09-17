<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user();
        return view('admin.profile.profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profiles = User::find($id);
        return view('admin.profile.edit-profile', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $avatar = $request->avatar;
        $about = $request->about;
        $email = $request->email;
        $phone = $request->phone;
        $DoB = $request->dob;
        $job = $request->job;
        $country = $request->country;
        $address = $request->address;
        if($request->hasfile('avatar')){
            $destination = 'asset/img/avatar/';
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('asset/img/avatar/', $filename);
            $avatar = $filename;
         }

         User::where('id','=',$id)->update([
            'name'=>$name,
            'profile_image'=>$avatar,
            'about'=>$about,
            'email'=>$email,
            'phone'=>$phone,
            'dob'=>$DoB,
            'job'=>$job,
            'country'=>$country,
            'address'=>$address
        ]);
       return redirect()->route('profile.index')->with('Success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

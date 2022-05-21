<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id   = Auth::id();
       // return dd($id);
        if ($user->profile == null) {

             $profile =  Profile::create([
            'user_id' => $id,
            'avatar' => '/uploads/avatar/1.png'
             ]);

           // return dd($id);
        }

        return view('users.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $this->validate($request,[
            "name"     => "required",
            "email"    => "required|email",
            "password" => "required"

        ]);

        $user = Auth::user();
        $id   = Auth::id();
        $currentUser = User::find($id);



        if ( $request->hasFile('avatar')  ) {
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar/',$avatar_new_name);
            $user->profile->avatar = '/uploads/avatar/'.$avatar_new_name;
            $user->profile->save();

        }

        $currentUser->name  = $request->name;
        $currentUser->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->twitter  = $request->twitter;
        $user->profile->github   = $request->github;
        $user->profile->about    = $request->about;
        $currentUser->save();
        $user->profile->save();


        if ( $request->has('password')  ) {

           $currentUser->password = bcrypt($request->password);
           $currentUser->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

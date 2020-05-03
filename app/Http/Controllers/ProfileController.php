<?php

namespace App\Http\Controllers;
use App\Policies\ProfilesPolicy;
use App\Profile;
use App\User;
use Faker\Provider\Image;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('verified');
    }


    public function index($user)
    {

        $use = User::find($user);
        $posts = DB::table('posts')->where('user_id', $user)->get();
        return view('profile.profile', ['user' => $use], ['posts' => $posts]);
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.EditProfile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $name = $request->input('name');
        $country = $request->input('country');
        $bdate = $request->input('bdate');
        $job  = $request->input('job');
        $wdate = $request->input('wdate');
        $des = $request->input('description');
        $web = $request->input('website');
        $pic = request('pic');
        if($pic) $pic = $pic->store('upload/pro_pic', 'public');
        if($name || $country || $bdate || $job || $wdate || $pic || $web || $des) {
            if ($name) {
                $user->name = $name;
                $user->save();
            }
            if ($country) {
                $user->profile->country = $country;
                $user->profile->save();
            }
            if ($bdate) {
                $user->profile->bdate = $bdate;
                $user->profile->save();
            }
            if ($job) {
                $user->profile->job = $job;
                $user->profile->save();
            }
            if ($wdate) {
                $user->profile->wdate = $wdate;
                $user->profile->save();
            }
            if ($pic) {
                $user->profile->pic = $pic;
                $user->profile->save();
            }
            if ($des) {
                $user->profile->description = $des;
                $user->profile->save();
            }
            if ($web) {
                $user->profile->website = $web;
                $user->profile->save();
            }
            echo 'updated';
        }
        else echo 'nothing to update';

        return redirect()->route('profile.show', $user);

    }


}

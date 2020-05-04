<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    public function create()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('posts.posts', ['user' => $user]);
    }
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['pcaption' => 'required', 'post' => 'required']);
        $path = request('post')->store('upload', 'public');
        $post = new posts();
        $post->pcaption = $data['pcaption'];
        $post->post = $path;
         Auth()->user()->posts()->create(
           [
               'pcaption' => $post->pcaption,
               'post' => $post->post,
            ]);
         return redirect()->route('home');
    }


    public function showdata($post)
    {
        $file = DB::table('posts')->find($post);
        $header = ['Content-Type', 'application/pdf'];
        $path = storage_path('app/public/'.$file->post);
        //$d = '/app/public/'.$file->posts;
        //dd(response()->file($path)->getFile()->getPath());
        //dd($file);
        //return view('posts.postview', ['posts' => response()->file($path)], ['file' => $file]);
        return view('posts.postview', ['file' => $path]);
    }






    }

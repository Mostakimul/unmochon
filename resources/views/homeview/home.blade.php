@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <div class = "d-flex justify-content-between">
                 hello {{ Auth::user()->name }}   You are logged in!
          <a href="{{ route('posts.create') }}">Create New Post</a>
                   </div>
                        <div class = "text-center">
                            <h3><br>New Posts</h3>
                        </div>
                        @foreach($posts as $post => $new)
                            @if(is_null($new->posts))<div class = "text-center">
                                <h3><br>No New Posts</h3>
                            </div>
                            @else
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                <div class="card" style="width: 35rem; height: 35rem;">
                                    <div class = "card-body">
                                        <div class="card-header">{{ $new->pcaption }}</div>
                                    <img class="card-img"
                                         src=" {{ asset('images/1.jpeg') }}"
                                         alt="image of paper"
                                         style="width: 100%; height: 50%">
                                        <h5 class="card-title">
                                            <br><b>Author: </b>
                                            {{ $new -> author}}</h5>
                                        <h5>
                                            <b>Uploaded: {{ $new -> created_at }}</b></h5>
                                        <a href="/storage/{{ $new -> posts }}"
                                           class="btn btn-primary">download</a>
                                        <div class="btn btn-secondary">upvote</div>
                                        <a href="{{ route('posts.reviews', $new->id) }}"
                                           class="btn btn-outline-success">reviews</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                </div>
                        </div>
                    </div>
            </div>
        </div>
</div>
@endsection

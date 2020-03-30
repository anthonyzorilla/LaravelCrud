@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <div class="row mt-2">
        <div class="col-md-12">
        <img style="width: 100%" src="/storage/cover_image/{{$post->cover_image}}" alt="{{$post->title}}">
        </div>
    </div>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    
    

    <hr>
    <small>Wrinten on : {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest()) <!--This Line is to hide button edit and delete if your not log in as user -->
        @if(Auth::user()->id == $post->user_id) <!--if you not the owner of the post your account when sining in is empty or kung meron may makikitang pos sa pag sign in -->
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST' , 'class' => 'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    @endsection
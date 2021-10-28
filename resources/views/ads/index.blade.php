@extends('authuser')

@section('content')
    @foreach($ads as $ad)
        <h2><a href=""{{$ad->title}}</h2>
        <p>{{$ad->user->name}}</p>
        <p>{{$ad->created_at->diffForHumans()}}</p>
        <p>{{$ad->description}}</p>
    @endforeach

    {{$ads ->links()}}
@endsection

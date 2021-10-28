@extends('authuser')

@section('content')
        <h2>{{$ad->title}}</h2>
        <p>{{$ad->user->name}}</p>
        <p>{{$ad->created_at->diffForHumans()}}</p>
        <p>{{$ad->description}}</p>
@endsection

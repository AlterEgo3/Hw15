@extends('layout')

@section('content')
    <p><a href="/">Назад</a></p>
    <h2 class="posttitle">{{$ad->title}}</h2>
    <p>{{$ad->user->name}}</p>
    <p>{{$ad->created_at->diffForHumans()}}</p>
    <p style="margin-bottom: 20px">{{$ad->description}}</p>
@endsection

@extends('layout')

@section('content')
    @auth
        <p><a href="{{ route('ads.create') }}">Создать объявление</a></p>
    @endauth

    @foreach($ads as $ad)
        <h2 class="posttitle"><a href="{{route ('ads.show',$ad->id)}}">{{$ad->title}}</a></h2>

        @if(\Illuminate\Support\Facades\Auth::id()==$ad->user_id)
            <p><a href="{{route('ads.create', $ad->id)}}">Изменить</a></p>
            <p><a href="{{route('ads.delete', $ad->id)}}">Удалить</a></p>
        @endif

        <p>{{$ad->user->name}}</p>
        <p>{{$ad->created_at->diffForHumans()}}</p>
        <p style="margin-bottom: 20px">{{$ad->description}}</p>
    @endforeach

    {{$ads->links()}}
@endsection

@extends('layout')

@section('content')

    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $ad->title ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="description">Описание</label>
<textarea class="form-control" id="description" name="description" rows="3">{{old('description',$ad->description ??'')}}</textarea>
        </div>

        @csrf

        <div class="mb-3">
            <input type="submit" class="btn btn-primary mb-3" value="@if(isset($id)) Create @else Save @endif" />
        </div>
    </form>
@endsection

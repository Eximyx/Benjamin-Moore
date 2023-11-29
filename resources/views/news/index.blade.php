@extends('layouts.news')
@section('content')
    <div>
        <div class="mb-3">
            <a href="{{route('news.create')}} " class="btn btn-primary mb-3">Create new post</a>
        </div>
        @foreach ($newsPosts as $newsPost)
        <div><a href="{{route('news.show',$newsPost->slug)}}">{{$newsPost->id}}.{{$newsPost->title}}</a></div>
        @endforeach
    </div>
@endsection
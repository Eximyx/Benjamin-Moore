@extends('layouts.news')
@section('content')
<h1>Новости</h1>
<div class = "">
    <h2>{{$newsPost->title}}</h2>
</div>
<div>
    {{$newsPost->main_image}}
</div>
<div id='content'>
    {!! $newsPost->content !!}
</div>
<div>
    {{$newsPost->category_id}}
</div>
<div>
    <a href="{{route('news.edit',$newsPost->id)}}">Edit</a>
</div>
<div>
    <form action="{{route('news.delete',$newsPost->id)}}"method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class = "btn - btn-danger">
    </form>
</div>
<div>
    <a href="{{route('news.index')}}">Back</a>
</div>

<script>
    const div = document.createElement('div');
    $('#content').appendChild(div);
</script>
@endsection
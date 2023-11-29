@extends('layouts.news')
@section('content')
    <div>
        <form action="{{route('news.update',$newsPost->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name = "title" class="form-control" id="title" placeholder="title" value = "{{$newsPost->title}}">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name = "content"   id="content" placeholder="content">{!! $newsPost->content !!}</textarea>
            </div>
            <div class="mb-3">
                <label for="main_image">Main_mage</label>
                <input type="text" name = "image" class="form-control" id="main_image" placeholder="main_image" value="{{$newsPost->main_image}}">
            </div>
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" name = "slug" class="form-control" id="slug" placeholder="slug" value="{{$newsPost->slug}}">
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select form-select-sm" id="category" name='category_id'>
                    @foreach ($categories as $category)
                    <option 
                    {{$category->id===$newsPost->category->id?'selected':''}}
                    value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        
        $(document).ready(function(){
            $('#content').summernote();
        });
    </script>
@endsection
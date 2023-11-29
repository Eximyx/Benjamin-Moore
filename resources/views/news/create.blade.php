@extends('layouts.news')
@section('content')
    <div>
        <form action="{{route('news.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input value="{{old('title')}}" type="text" name = "title" class="form-control" id="title" placeholder="title">
                @error('title')
                <p class='text-danger'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name = "content" id="content" placeholder="content">{{old('content')}}</textarea>
                @error('content')
                <p class='text-danger'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="main_image">Main_Image</label>
                <input type="text" value = " {{old('main_image')}}"name = "main_image" class="form-control" id="main_image" placeholder="main_image">
                @error('main_image')
                <p class='text-danger'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select form-select-sm" id="category" name='category_id'>
                    @foreach ($categories as $category)
                    <option 
                    value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content">slug</label>
                <textarea name = "slug" class="form-control" id="slug" placeholder="slug">{{old('slug')}}</textarea>
                @error('slug')
                <p class='text-danger'>{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script>
        
        $(document).ready(function(){
            $('#content').summernote();
        });
    </script>
@endsection
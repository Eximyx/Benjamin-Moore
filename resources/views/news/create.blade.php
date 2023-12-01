@extends('layouts.admin')
@section('contents')
    <div>

        <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
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
                <textarea name = "content" id="summernote-content" placeholder="content">{{old('content')}}</textarea>
                @error('summernote-content')
                <p class='text-danger invisible'>Файл должен быть изображением!</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="main_image">Main_Image</label>
                <img class="w-50 h-50 img-thumbnail" id="result">
                <input type="file" value = " {{old('main_image')}}" name = "main_image" class="form-control" id="main_image" placeholder="main_image">
                <p class='text-danger invisible' id="image-error-message">Файл должен быть изображением!</p>
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
            $('#summernote-content').summernote();
            const upload = document.querySelector('#main_image');
            const result = document.querySelector('#result');
            upload.addEventListener("change", (e) => {
                if (!previewFunc(e.target.files[0])) {
                    upload.value = '';
                } else {
                    $('#image-error-message').addClass('invisible');
                }
            });
            function previewFunc(file) {
                if (!file.type.match(/image.*/)) {
                    $('#image-error-message').removeClass('invisible');
                    $('#image-error-message').addClass('visible');
                    return false
                }
                const reader = new FileReader();
                reader.addEventListener("load", (e) => {
                    result.src = e.target.result;
                });
                reader.readAsDataURL(file);
                return true;
            }
        });
    </script>
@endsection

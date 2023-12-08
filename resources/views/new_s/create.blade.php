@extends('layouts.admin')
@section('contents')
    <div>
        <form action="{{route('news.store')}}" method="post" id="uploading_id" name="uploading_form" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="title">Title</label>
                <input value="{{old('title')}}" type="text" name="title" maxlength="255" class="form-control" id="title"
                       placeholder="title">
                @error('title')
                <p class='text-danger'>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label for="summernote-content">Content</label>
                <textarea name="content" id="summernote-content" placeholder="content">{{old('content')}}</textarea>
                <p class='text-danger invisible'>Файл должен быть изображением!</p>
            </div>
            <div class="mb-2">
                <label for="main_image">Main_Image</label>

                <input type="file" value="{{old('main_image')}}" name="main_image" class="form-control" id="main_image"
                       placeholder="main_image">
                <p class='text-danger invisible ' style="margin-bottom: .9em;height: .9em" id="image-error-message">Файл
                    должен быть изображением!</p>

                <img src="{{old('main_image')}}" style="border-width: 1px" class="w-50 h-50 img-thumbnail m-0"
                     id="result">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script>


        $(document).ready(function () {

        });
    </script>
@endsection

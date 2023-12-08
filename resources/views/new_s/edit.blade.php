@extends('layouts.admin')
@section('contents')
    <div>
        <form action="{{route('news.update',$newsPost)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" maxlength="255" name="title" class="form-control" id="title" placeholder="title"
                       value="{{$newsPost->title}}">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name="content" id="summernote-content"
                          placeholder="content">{!! $newsPost->content !!}</textarea>
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
        <button type="button" id="test" class="mt-2 btn btn-primary">test</button>
    </div>
    <script>
        $(document).ready(function () {
            $('#summernote-content').summernote();
            const upload = document.querySelector('#main_image');
            const result = document.querySelector('#result');
            const error_message = $('#image-error-message');
            const default_image = "{{url('storage/image/'.$newsPost->main_image)}}";
            result.src = default_image;
            upload.addEventListener("change", (e) => {
                error_message.addClass('invisible');
                if (!previewFunc(e.target.files[0])) {
                    error_message.removeClass('invisible').addClass('visible');
                    upload.value = '';
                    result.src = default_image;
                } else {
                    error_message.addClass('invisible');
                }
            });

            function previewFunc(file) {
                if (!file.type.match(/image.*/)) {
                    return false;
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

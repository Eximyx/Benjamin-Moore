@extends('layouts.admin')
@section('content')
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
                <textarea name = "content"   id="content" placeholder="content">{!! $newsPost->content !!}</textarea>
            </div>
            <div class="row mb-3">
                <label for="main_image">Main_mage</label>
                <img class="w-50 h-50 img-thumbnail" id="result" src="{{url('storage/image/'.$newsPost->main_image)}}">
                <input  type="file" name = "main_image" class="form-control" id="main_image" placeholder="main_image">
                <p class='text-danger invisible' id="image-error-message">Файл должен быть изображением!</p>
            </div>
            {{--            <div class="mb-3">--}}
            {{--                <label for="slug">Slug</label>--}}
            {{--                <input type="text" name="slug" class="form-control" id="slug" placeholder="slug"--}}
            {{--                       value="{{$newsPost->slug}}">--}}
            {{--            </div>--}}
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
            const upload = document.querySelector('#main_image');
            const result = document.querySelector('#result');
            upload.addEventListener("change", (e) => {
                if (!previewFunc(e.target.files[0])) {
                    upload.value = '';
                }
                else {
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
                reader.addEventListener("load",(e) => {
                    console.log(e);
                    result.src = e.target.result;
                });
                console.log()
                reader.readAsDataURL(file);
                return true;
            }
        });
    </script>
@endsection

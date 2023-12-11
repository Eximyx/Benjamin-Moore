@extends('layouts.admin')
@section('contents')
    <h1>Новости</h1>
    <div class="col">
        <div style="height: 10em;border-width: 2px" class="row-lg-6 mb-4">
            <div class="m-0 text-white text-truncate rounded"
                 style="height: 10em;background-repeat: no-repeat;background-image: url({{url('storage/image/'.$newsPost->main_image)}})">
                <p style="white-space: normal" class="m-0 text-black font-weight-bold">
                    {{$newsPost->title}}
                </p>
            </div>
        </div>
        <div class="col-lg-6 mb-4" id='content'>
            {!! $newsPost->content !!}
        </div>
    </div>
@endsection

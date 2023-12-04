@extends('layouts.admin')
@section('content')
    <div>
        <div class="">
            <a href="{{route('categories.create')}} " class="btn btn-primary mb-3">Add category</a>
        </div>
        <div>
            <h3>Категории</h3>
        </div>
        <div class="">
        @foreach ($categories as $category)
                <div class="" style="">
                    <h5 class="card-title">{{$category->title}}</h5>
                    <form action="{{route('categories.delete',$category)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            @endforeach
        </div>

@endsection

@extends('layouts.admin')
@section('content')
<div>
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input value="{{old('title')}}" type="text" name = "title" class="form-control" id="title" placeholder="title">
            @error('title')
            <p class='text-danger'>{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

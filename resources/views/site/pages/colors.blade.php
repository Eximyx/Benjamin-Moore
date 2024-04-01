@extends('site.layouts.site')
@section('content')
    {{$data["colors"]}}
@endsection
@push('scripts')
    @vite(['resources/js/slider.js'])
@endpush

@extends('site.layouts.site')
@section('content')
    {{$colors[0]->hex_code ?? null}}
@endsection
@push('scripts')
    @vite(['resources/js/slider.js'])
@endpush

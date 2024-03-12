@extends('frontend.layout')
@section('content')
    @include('frontend.breadcrumbs')
    {!! html_entity_decode($data['entity']->content) !!}
@endsection
@section('scripts')
@endsection

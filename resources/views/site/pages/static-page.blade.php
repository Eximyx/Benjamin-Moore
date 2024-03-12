@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
    {!! html_entity_decode($data['entity']->content) !!}
@endsection
@section('scripts')
@endsection

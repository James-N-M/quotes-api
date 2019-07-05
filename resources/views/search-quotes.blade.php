@extends('layouts.app')

@section('content')
    <quote-search-page :tag="{{$tag}}"></quote-search-page>
@endsection

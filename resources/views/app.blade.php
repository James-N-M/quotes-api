@extends('layouts.app')

@section('content')
<div class="container">
    <router-view></router-view>

    <hr>
    <router-link to="/">Home</router-link>
    <router-link to="/about">About</router-link>
</div>
@endsection

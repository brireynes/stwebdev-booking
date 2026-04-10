@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    @include('partials.header')
    <ul>
        @foreach ($features as $feature)
            <li>{{ $feature }}</li>
        @endforeach
    </ul>
    @include('partials.footer')
@endsection
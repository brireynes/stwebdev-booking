@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <div class="action-group">
        @foreach ($options as $option)
            <a class="button-link" href="{{ $option['route'] }}">{{ $option['label'] }}</a>
        @endforeach
    </div>
@endsection
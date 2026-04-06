@extends('layouts.app')

@section('content')
    <div class="auth-card">
        <h1>{{ $title }}</h1>

        <form method="GET" action="{{ $formAction }}">
            @foreach ($fields as $field)
                <div class="form-group">
                    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                    <input
                        type="{{ $field['type'] }}"
                        id="{{ $field['name'] }}"
                        name="{{ $field['name'] }}"
                        placeholder="{{ $field['placeholder'] }}"
                    >
                </div>
            @endforeach

            <button type="submit" class="submit-button">{{ $submitLabel }}</button>
        </form>

        <div class="small-link">
            <span>Choose a different login type? </span>
            <a href="{{ route('login.choice') }}">Back</a>
        </div>
    </div>
@endsection
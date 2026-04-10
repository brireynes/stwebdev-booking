@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>

    <form method="POST" action="{{ $formAction }}">
        @csrf

        @foreach ($fields as $field)
            <div class="form-group">
                <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                <input
                    type="{{ $field['type'] }}"
                    id="{{ $field['name'] }}"
                    name="{{ $field['name'] }}"
                    placeholder="{{ $field['placeholder'] }}"
                    value="{{ old($field['name']) }}"
                >
                @error($field['name'])
                    <div style="color: #b91c1c; margin-top: 6px;">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit">{{ $submitLabel }}</button>
    </form>
@endsection
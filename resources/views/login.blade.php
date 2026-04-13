@extends('layouts.app')

@section('content')

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

        <button type="submit">{{ $submitLabel }}</button>
    </form>
@endsection
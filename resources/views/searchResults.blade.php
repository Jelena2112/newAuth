@extends('layout')

@section('content')

    @foreach($search as $city)

        <p><a href="{{ route('forecast.any', ['city' => $city->name]) }}">{{ $city->name }}</a></p>

    @endforeach

@endsection


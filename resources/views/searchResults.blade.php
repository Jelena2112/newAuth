@extends('layout')

@section('content')

    @foreach($search as $city)

        <p>{{ $city->name }}</p>

    @endforeach

@endsection


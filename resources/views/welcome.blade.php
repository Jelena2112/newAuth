@extends('layout')

@section('content')
    <h4>Trenutna temperatura za gradove koje ste lajkovali</h4>
    @foreach($userLiked as $likedCity)
        <p> {{ $likedCity->city->name }} : {{ $likedCity->city->todaysForecast->temperature }}</p>
    @endforeach

    <form method="GET" action="{{ route('forecast.search') }}">

        {{ csrf_field() }}

        <h3>Pretraga</h3>

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif

        <div class="mb-3">
            <input type="text" name="city" placeholder="Ime grada">
        </div>

        <button class="btn btn-primary">Submitt</button>
    </form>

@endsection

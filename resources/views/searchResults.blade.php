@extends('layout')

@section('content')

    @foreach($search as $city)

        @php $icon = \App\Http\ForecastHelper::getIconByWeather($city->todaysForecast->weather_type) @endphp

        <p><a href="{{ route('forecast.any', ['city' => $city->name]) }}"> <i class="fas {{ $icon }}"></i> {{ $city->name }}</a></p>

    @endforeach

@endsection


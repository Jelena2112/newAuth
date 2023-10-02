@extends('layout')

@section('content')

    <div class="mt-5 d-flex flex-wrap p-4">
        @foreach($search as $city)

            @php $icon = \App\Http\ForecastHelper::getIconByWeather($city->todaysForecast->weather_type) @endphp

            <p class="col-2 m-2"> <i class="fas fa-thumbs-up btn btn-primary"></i>
                <a class="btn-primary btn" href="{{ route('forecast.any', ['city' => $city->name]) }}">
                    <i class="fas {{ $icon }}"></i> {{ $city->name }}
                </a>
            </p>

        @endforeach
    </div>


@endsection


@extends('layout')

@section('content')

    <div class="mt-5 d-flex flex-wrap p-4">
        @if(\Illuminate\Support\Facades\Session::get('error'))
            <p class="text-danger fw-bolder">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
            <a class="btn btn-outline-primary " href="/login">Ulogujte se</a>
        @endif

    @foreach($search as $city)

            @php $icon = \App\Http\ForecastHelper::getIconByWeather($city->todaysForecast->weather_type) @endphp

            <p class="col-2 m-2">

                @if(in_array($city->id, $userCities))
                    <a class="btn btn-primary" href="{{ route('user.unlike', ['city'=> $city->id]) }}">
                        <i class="far fa-thumbs-up"></i>
                    </a>
                @else
                    <a class="btn btn-primary" href="{{ route('user.favourite', ['city'=> $city->id]) }}">
                        <i class="fas fa-thumbs-up "></i>
                    </a>
                @endif


                <a class="btn-primary btn" href="{{ route('forecast.any', ['city' => $city->name]) }}">
                    <i class="fas {{ $icon }}"></i> {{ $city->name }}
                </a>
            </p>

        @endforeach
    </div>

@endsection


@foreach($prognoza as $cityWeather)

    <p>U {{ $cityWeather->city->name }} je danas {{ $cityWeather->temperature}} stepeni.</p>

@endforeach


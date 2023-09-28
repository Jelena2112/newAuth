@foreach($city->forecast as $forecast)

    <p>{{ $loop->index+1 }}. U {{ $forecast->city->name }} je datum: {{ $forecast->forecast_date }}, Temperatura:  {{$forecast->temperature}} stepeni.</p>

@endforeach

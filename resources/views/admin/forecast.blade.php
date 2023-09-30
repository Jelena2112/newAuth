<form method="POST" action="{{ route('admin.add.forecast') }}">
    {{ csrf_field() }}

    <input name="temperature" type="number" placeholder="Unesite temp.">
    <input name="probability" type="number" placeholder="Verovatnoca padavina">
    <input name="forecast_date" type="date">

    <select name="weather_type">
        @foreach(\App\Models\ForecastModel::WEATHER as $weather)
            <option value="{{ $weather }}">{{ $weather }}</option>
        @endforeach
    </select>

    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>

    <button>Snimi</button>
</form>

@foreach(\App\Models\CitiesModel::all() as $city)
    <p>{{ $city->name }}</p>
    <ul>
        @foreach($city->forecast as $forecast)
            @php
                $color = \App\Http\ForecastHelper::getColorByTemp($forecast->temperature);
            @endphp
            <li>Date: {{ $forecast->forecast_date }} - <span style="color : {{ $color }}"> Temperature: {{ $forecast->temperature }}</span> </li>
        @endforeach
    </ul>

@endforeach
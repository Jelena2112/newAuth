
<form action="{{ route('admin.weather.update') }}" method="POST">

    {{ csrf_field() }}

    <input name="temperature" type="number" placeholder="Unesite temp.">

    <select name="city_id">

        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach

    </select>
     <button>Snimi</button>
</form>
<div>
    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p>
            <span>{{ $loop->index + 1 }}.</span>
            {{ $weather->city->name }} - {{ $weather->temperature }} stepena
        </p>
    @endforeach
</div>

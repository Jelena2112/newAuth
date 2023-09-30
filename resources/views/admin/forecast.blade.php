@extends("admin.layoutAdmin")

@section("content")

    <form class="d-flex col-8 p-3 m-2 flex-column" method="POST" action="{{ route('admin.add.forecast') }}">

        <h4 class="m-3">Kreirenje nove prognoze</h4>

        {{ csrf_field() }}
        <div class="mb-3 col-4">
            <input class="form-control" name="temperature" type="number" placeholder="Unesite temp.">
        </div>
        <div class="mb-3 col-4">
            <input class="form-control" name="probability" type="number" placeholder="Verovatnoca padavina">
        </div>
        <div class="mb-3 col-4">
            <input class="form-control" name="forecast_date" type="date">
        </div>
        <div class="mb-3 col-4">
            <select name="weather_type" class="form-select">
                @foreach(\App\Models\ForecastModel::WEATHER as $weather)
                    <option value="{{ $weather }}">{{ $weather }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-4">
            <select name="city_id" class="form-select">
                @foreach(\App\Models\CitiesModel::all() as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <button class="btn btn-primary">Snimi</button>
        </div>

    </form>

    <div class="d-flex flex-wrap">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <div class="m-3">
                <p class="mb-1 fw-bold">{{ $city->name }}</p>
                <ul class="list-group mb-4 ">
                    @foreach($city->forecast as $forecast)
                        @php
                            $color = \App\Http\ForecastHelper::getColorByTemp($forecast->temperature);
                        @endphp
                        <li class="list-group-item">Date: {{ $forecast->forecast_date }} - <span style="color : {{ $color }}"> Temperature: {{ $forecast->temperature }}</span> </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>


@endsection



@extends('layout')

@section('content')

    <form method="GET" action="{{ route('forecast.search') }}">

        {{ csrf_field() }}

        <h3>Pretraga</h3>

        <div class="mb-3">
            <input type="text" name="city" placeholder="Ime grada">
        </div>

        <button class="btn btn-primary">Submitt</button>
    </form>

@endsection

@extends('layout')

@section('content')

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

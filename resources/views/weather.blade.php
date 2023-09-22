@foreach($prognoza as $city => $temp)

    <p>U {{ $city }} je danas {{ $temp }}.</p>

@endforeach


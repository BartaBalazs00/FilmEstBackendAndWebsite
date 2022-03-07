@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($filmek as $film)
        <img src="{{ $film->imageUrl }}" alt="">
        <h1>{{ $film->cim }}</h1>
    @endforeach
</div>
@endsection

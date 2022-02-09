@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($filmek as $film)
        <div>
            <img src="{{$film->imageUrl}}" alt="">
            <h1>{{$film->Cim}}</h1>
        </div>
    @endforeach
</div>
@endsection
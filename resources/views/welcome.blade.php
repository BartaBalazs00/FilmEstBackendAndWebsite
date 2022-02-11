@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($filmek as $film)
        <div class="col-lg-3 col-sm-6">
            <img src="{{$film->imageUrl}}" alt="">
            <h1>{{$film->cim}}</h1>
        </div>
    @endforeach
</div>
</div>
@endsection
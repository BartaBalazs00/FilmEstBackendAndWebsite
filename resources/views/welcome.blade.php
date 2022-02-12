@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($filmek as $film)
        
            <div class="card col-lg-3 col-sm-6 p-2 mx-0">
                <a href="">
                <div class="card-title">
                    <img src="{{$film->imageUrl}}" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <h1>{{$film->cim}}</h1>
                </div>
                </a>
            </div>
        
    @endforeach
</div>
</div>
@endsection
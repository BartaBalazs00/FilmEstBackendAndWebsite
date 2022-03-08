@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>The actors number: {{$szineszekSzama}}</h1>
        @foreach ($filmek as $film)
        
            <div class="card col-lg-3 col-sm-6 p-2 mx-0">
                <a href="/film/{{$film->id}}">
                <div class="card-title">
                    <img src="{{$film->imageUrl}}" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <h1>{{$film->cim}}</h1>
                </div>
                </a>
            </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $filmek->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('film.search') }}" method="GET">
            <div class="form-group d-flex justify-content-center mb-5">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control " name="search" value="{{$search}}" placeholder="Search for film title">
                </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </form>
        @if($error != "")
            <h1>{{ $error }}</h1>
        @endif  
    </div>

    <div class="row justify-content-center">
        

        @foreach ($filmek as $film)
        
            <div class="card col-lg-3 col-sm-6 m-3 p-2 image-card">
                <a href="/film/{{$film->id}}">
                <div class="card-title">
                    <img src="{{$film->imageUrl}}" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h2 class="fa fa-star checked"></h2><h2>{{ $film->ertekeles }}</h2>
                    </div>
                    <h1>{{$film->cim}}</h1>
                </div>
                </a>
            </div>
    @endforeach
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center pagination-lg link">
            {{ $filmek->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
@endsection
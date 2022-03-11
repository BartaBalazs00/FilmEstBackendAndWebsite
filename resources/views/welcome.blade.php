@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('film.search') }}" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" name="search" value="{{$search}}" placeholder="Search for film title">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        @if($error != "")
            <h1>{{ $error }}</h1>
        @endif  
    </div>

    <div class="row">
        

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
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            @if(sizeof($filmek) > 0)
                {{ $filmek->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>

</div>
@endsection
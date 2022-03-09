@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{url('/search-film')}}" method="post">
            @csrf
            <input type="text" name="title" placeholder="Search for Film Title"/>
            <input type="submit" value="Search"/>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $error->first("title") }}</strong>
                </span>
            @enderror
        </form>
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
            {{ $filmek->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
@endsection
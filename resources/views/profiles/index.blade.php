@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('user.search') }}" method="GET">
            <div class="form-group d-flex justify-content-center">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" name="search" value="{{$search}}" placeholder="Search for users">
                </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </form>
        @if($error != "")
            <h1>{{ $error }}</h1>
        @endif      
    </div>
    @foreach($users as $user)
    
        <div class="d-flex pt-5 pb-2">
            <div class="pe-3">
                <a href="{{ route('profile.show', $user->id) }}"><img src="{{ $user->profile->profileImage()}}" class="img-fluid rounded-circle w-100" style="max-width: 40px"></a>
            </div>
            <div>
                <h1><a href="{{ route('profile.show', $user->id) }}">{{ $user->username }}</a></h1>
            </div>
        </div>
        <hr>
        @php $mentettFilmek = $user->getMentettFilmek($user); @endphp
        <div class="row pb-5">
            @if ($mentettFilmek->count() > 0)
                    @foreach ( $mentettFilmek as $mentettFilm)
                    <div class="card col-lg-3 col-sm-6 m-3 p-2">
                        <a href="/film/{{$mentettFilm->id}}">
                        <div class="card-title">
                            <img src="{{$mentettFilm->imageUrl}}" class="card-img-top" alt="">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center ">
                                <h2 class="fa fa-star checked"></h2><h2>{{ $mentettFilm->ertekeles }}</h2>
                            </div>
                            <h1>{{$mentettFilm->cim}}</h1>
                        </div>
                        </a>
                    </div>
                    @endforeach
            @else
                <h1>Has no saved movies <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center pagination-lg">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection

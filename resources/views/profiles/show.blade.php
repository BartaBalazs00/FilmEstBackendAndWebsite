@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-3" id="profile">
        <div class="col-xl-3 col-md-5 ">
            <img src="{{ $user->profile->profileImage()}}" class=" rounded-circle mt-3 height: auto img-fluid">
        </div>
            <div class="col-xl-9 col-md-7 pt-5">
                <div class="d-flex align-items-center pb-2 ">
                    <div class="h1">{{$user->username}}</div>
                    @if(Auth::check())
                        @if(auth()->user()->id != $user->id)
                            <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                        @endif
                    @endif
                </div>
                @can('update', $user->profile)
                <Button class="btn btn-primary bg-primary  mb-3"><a style="color: white" href="/profile/{{$user->id}}/edit">Edit profile</a></Button>
                @endcan
                <div class="d-flex">
                    <div class="pe-5"><strong>{{$mentettFilmek->count()}}</strong> saved movies</div>
                    <div class="pe-5"><strong>{{$user->profile->followers->count()}}</strong><a href="{{ route('profile.followers', $user->id)}}"> followers</a></div>
                    <form id="welcome-form" action="{{ route('profile.followers', $user->id) }}" method="GET" class="d-none">
                        @csrf
                    </form>

                    <div class="pe-5"><strong>{{$user->following->count()}}</strong><a href="{{ route('profile.following', $user->id)}}"> following</a></div>
                    <form id="welcome-form" action="{{ route('profile.following', $user->id) }}" method="GET" class="d-none">
                        @csrf
                    </form>

                </div>
                <div class="pt-2 h3"><strong>{{$user->profile->cim}}</strong></div>
                <div class="pt-2 h3">{{$user->profile->leiras}}</div>
                <div class="pt-3 fw-bold"><a href="{{$user->profile->url}}" target="blank"> {{$user->profile->url}}</a></div>
            </div>
        </div>
        <hr>
        @if(Auth::check())
            @if(auth()->user()->id === $user->id && $mentettFilmek->count() === 0)
                <div style='text-align: center'>
                    <div>
                        <h1 >You have no saved movies</h1>
                    </div>
                    <div class="wh-50%" style="font-size: 300px">
                        <i class="fas fa-frown"></i>
                    </div>
                    <div>
                        <h2>
                            <a href="{{ url('/') }}">
                                Search for movies
                            </a>
                        </h2>
                    </div>
                </div>
            @endif
            @if(auth()->user()->id !== $user->id && $mentettFilmek->count() === 0)
                <div style='text-align: center'>
                    <div>
                        <h1 >{{$user->username}} has no saved movies</h1>
                    </div>
                    <div class="wh-50%" style="font-size: 300px">
                        <i class="fas fa-frown"></i>
                    </div>
                </div>
            @endif
            @if(auth()->user()->id === $user->id && $mentettFilmek->count() > 0)
                <div style='text-align: center' class="h1">Your saved movies are</div>
            @endif
            @if(auth()->user()->id !== $user->id && $mentettFilmek->count() > 0)
                <div style='text-align: center' class="h1">{{$user->username}} saved movies are</div>
            @endif
        @endif
            <div class="row pt-5 justify-content-center">
                @if ($mentettFilmek->count() > 0)
                    @foreach ( $mentettFilmek as $mentettFilm)
                    <div class="card col-lg-3 col-sm-6 m-3 p-2 image-card ">
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
                @endif
        </div>
    
    

</div>
@endsection

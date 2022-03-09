@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <img src="{{ $user->profile->profileImage()}}" class=" rounded-circle mt-5 height: auto img-fluid">
        </div>
            <div class="col-lg-9 col-sm-6 pt-5">
                <div class="d-flex align-items-center pb-3 ">
                    <div class="h4">{{$user->username}}</div>
                    @if(Auth::check())
                        @if(auth()->user()->id != $user->id)
                            <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                        @endif
                    @endif
                </div>
                @can('update', $user->profile)
                    <div class="pb-3"><a href="/profile/{{$user->id}}/edit">Edit profile</a></div>
                @endcan
                <div class="d-flex">
                    <div class="pe-5"><strong>{{$mentettFilmek->count()}}</strong> saved films</div>
                    <div class="pe-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                    <div class="pe-5"><strong>{{$user->following->count()}}</strong><a href="{{ route('profile.following', $user->id)}}">following</a></div>
                    <form id="welcome-form" action="{{ route('profile.following', $user->id) }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="pt-3"><strong>{{$user->profile->cim}}</strong></div>
                <div class="pt-3">{{$user->profile->leiras}}</div>
                <div class="pt-3 fw-bold"><a href="#"> {{$user->profile->url}}</a></div>
            </div>
        </div>
            <div class="row pt-5">
                @if ($mentettFilmek->count() > 0)
                    @foreach ( $mentettFilmek as $mentettFilm)
                    <div class="card col-lg-3 col-sm-6 p-2 mx-0">
                        <a href="/film/{{$mentettFilm->id}}">
                        <div class="card-title">
                            <img src="{{$mentettFilm->imageUrl}}" class="card-img-top" alt="">
                        </div>
                        <div class="card-body">
                            <h1>{{$mentettFilm->cim}}</h1>
                        </div>
                        </a>
                    </div>
                    @endforeach
                @endif
        </div>
    
    

</div>
@endsection

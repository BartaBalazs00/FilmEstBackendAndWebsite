@extends('layouts.app')

@section('content')
<div class="container">
    {{-- write different text if the user is logged in --}}
    @php
        $loggedIn = false;
    @endphp
    @if(Auth::check())
        @if(auth()->user()->id === $followedUser->id)
            @php
                $loggedIn = true;
            @endphp
        @endif
    @endif
    @if($loggedIn === true)
        @if($users->count() != 0)
            <h1 style='text-align: center'>Your followers are</h1>
        @else
            <div style='text-align: center'>
                <h1>You have no followers</h1>
                <div class="wh-50%" style="font-size: 300px">
                    <i class="fas fa-frown"></i>
                </div>
            </div>
        @endif
    @else
        @if($users->count() != 0)
            <h1 style='text-align: center'><strong>{{ $followedUser->username }}'s followers are</strong> </h1>
        @else
            <h1 style='text-align: center'><strong>{{ $followedUser->username }} has no followers</strong> </h1>
        @endif
    @endif
    

    @foreach($users as $user)

        <div class="d-flex pt-5 pb-3">
            <div class="pe-3">
                <img src="{{ $user->profile->profileImage()}}" class="img-fluid rounded-circle w-100" style="max-width: 40px">
            </div>
            <div>
                <h1><a href="{{ route('profile.show', $user->id) }}">{{ $user->username }}</a></h1>
            </div>
        </div>
        @php $mentettFilmek = $user->getMentettFilmek($user); @endphp
        <div class="row pb-5">
            @if ($mentettFilmek->count() > 0)
                    @foreach ( $mentettFilmek as $mentettFilm)
                    <div class="card col-lg-3 col-sm-6 m-1 p-2 " style="width:20rem">
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
            @else
                <h1>Has no saved movies <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    @endforeach

</div>
@endsection

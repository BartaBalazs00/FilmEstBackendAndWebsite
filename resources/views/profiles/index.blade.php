@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('user.search') }}" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" value="{{$search}}" name="search" placeholder="Search for users">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        @if($error != "")
            <h1>{{ $error }}</h1>
        @endif      
    </div>
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
        <div class="row">
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
            @else
                <h1>Has no saved films <i class="fas fa-frown"></i></h1>
            @endif
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection

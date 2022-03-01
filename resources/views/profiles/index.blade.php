@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <img src="/storage/{{ $user->profile->image}}" class=" rounded-circle pt-5 height: auto img-fluid">
        </div>
            <div class="col-lg-9 col-sm-6 pt-5">
                <div><h1>{{$user->username}}</h1></div>

                @can('update', $user->profile)
                    <div class="pb-3"><a href="/profile/{{$user->id}}/edit">Profil szerkesztése</a></div>
                @endcan
                
                <div class="pe-5"><strong>153</strong> mentett filmek</div>
                <div class="pt-3"><strong>{{$user->profile->cim}}</strong></div>
                <div class="pt-3">{{$user->profile->leiras}}</div>
                <div class="pt-3 fw-bold"><a href="#"> {{$user->profile->url}}</a></div>
            </div>
        </div>
    </div>

</div>
@endsection

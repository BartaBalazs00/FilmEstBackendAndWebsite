@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <img src="/img/FilmEst.jpg" class="rounded-circle pt-5 height: auto img-fluid">
        </div>
            <div class="col-lg-9 col-sm-6 pt-5">
                <div><h1>{{$user->username}}</h1></div>
                <div class="pe-5"><strong>153</strong> saved films</div>
                <div class="pt-3">{{$user->profile->cim}}</div>
                <div class="pt-3">{{$user->profile->leiras}}</div>
                <div class="pt-3 fw-bold"><a href="#"> {{$user->profile->url ?? 'N/A'}}</a></div>
            </div>
        </div>
    </div>

</div>
@endsection
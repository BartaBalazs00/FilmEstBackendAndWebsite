@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{$film->imageUrl}}" class="w-100 img-fluid">
        </div>
        <div class="col-lg-6">

            <label for="cim">Title:</label>
            <h1 class="ps-3" id="cim">{{$film->cim}}</h1>

            <label class="pt-4" for="cim">Released Date:</label>
            <h1 class="ps-3" id="cim">{{$film->megjelenesiEv}}</h1>

            <label class="pt-4" for="leiras">Descripiton:</label>
            <h2 class="ps-3" id="leiras">{!! $film->leiras !!}</h2>

            <label class="pt-4" for="ertekeles">Rate:</label>
            <h3 class="ps-3">{{$film->ertekeles}}</h3>

            <label class="pt-4" for="kategoriak">Categories:</label>
            <div id="kategoriak" class="d-flex">
                @foreach ($film->kategoriak as $kategoria)
                    <h4 class="ps-3">{{$kategoria->kategoria}}</h4>
                @endforeach
            </div>

            <label class="pt-4" for="szineszek">Actors:</label>
            <div class="szineszek">
                @foreach ($film->szineszek as $szinesz)
                    <h4 class="ps-3">{{$szinesz->szineszNev}}</h4>
                @endforeach
            </div>

            <label class="pt-4" for="rendezo">Director:</label>
            <div class="rendezo">
                @foreach ($film->rendezok as $rendezo)
                    <h4 class="ps-3">{{$rendezo->rendezoNev}}</h4>
                @endforeach
            </div>
            <div class="pt-4">
                @if (Auth::check())
                    @if($film->isFavouritedBy(Auth::user()))
                        
                        <form action="{{route('film.removeFromFavourites', $film->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <Button type="submit" class="btn btn-lg btn-primary">Remove from my favourites</Button>
                        </form>

                    @else

                        <form action="{{route('film.addtofavourites', $film->id)}}" method="POST">
                            @csrf
                            <Button type="submit" class="btn btn-lg btn-primary">Add to my favourites</Button>
                        </form>

                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
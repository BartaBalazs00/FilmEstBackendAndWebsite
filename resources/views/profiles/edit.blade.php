@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit profile</h1>
                </div>
                <div class="form-group row">
                    <label for="cim" class="col-md-4 col-form-label">Title</label>

                    <input id="cim"
                           type="text"
                           class="form-control{{ $errors->has('cim') ? ' is-invalid' : '' }}"
                           name="cim"
                           value="{{ old('cim') ?? $user->profile->cim }}"
                           autocomplete="cim" autofocus>

                    @if ($errors->has('cim'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cim') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="leiras" class="col-md-4 col-form-label">Description</label>

                    <input id="leiras"
                           type="text"
                           class="form-control{{ $errors->has('leiras') ? ' is-invalid' : '' }}"
                           name="leiras"
                           value="{{ old('leiras') ?? $user->profile->leiras }}"
                           autocomplete="leiras" autofocus>

                    @if ($errors->has('leiras'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('leiras') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>

                    <input id="url"
                           type="text"
                           class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                           name="url"
                           value="{{ old('url') ?? $user->profile->url }}"
                           autocomplete="url" autofocus>

                    @if ($errors->has('url'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong style="font-size: 12; color: #DC3545;">{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
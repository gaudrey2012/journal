@extends('layouts.dashboard')
@section('content')
    <div class="container card shadow">
        <h1 class="text-center mt-5">Poster une nouvelle categorie</h1>
        <form action="{{ route('categorie.store') }}" method="post">
            @csrf
            @method('post')
            <div class="row justify-content-center ">
                <div class="form-group col-11">
                    <label for="" class="form-label">Titre</label>
                    <input type="text" name="title" id="" placeholder="Titre de votre categorie" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Sous-titre</label>
                    <input type="text" name="subtitle" id="" placeholder="Sous-titre de votre categorie" class="form-control @error('subtitle') is-invalid @enderror">
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 pb-1">
                <button class="btn btn-success text-light" type="submit">Poster la categorie</button>
            </div>
        </form>
    </div>
@endsection
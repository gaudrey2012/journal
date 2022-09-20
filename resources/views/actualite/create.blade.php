@extends('layouts.dashboard')
@section('content')
    <div class="container card shadow">
        <h1 class="text-center mt-5">Poster une nouvelle actualite</h1>
        <form action="{{ route('actualite.store')}}" method="post">
            @csrf
            @method('post')
            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Titre</label>
                    <input type="text" name="titre" id="" placeholder="Titre de votre actualite" class="form-control @error('titre') is-invalid @enderror">
                    @error('titre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Sous-titre</label>
                    <input type="text" name="description" id="" placeholder="Sous-titre de votre actualite" class="form-control @error('description') is-invalid @enderror">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Categorie</label>
                    <select name="category" class="form-control" id="">
                        @foreach ($categorie as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 pb-1">
                <button class="btn btn-success text-light" type="submit">Poster l'actualite</button>
            </div>
        </form>
    </div>
@endsection
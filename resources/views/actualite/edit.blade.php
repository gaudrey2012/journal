@extends('layouts.dashboard')
@section('content')
    <div class="container card shadow">
        <h1 class="text-center mt-5">Editer cette actualite</h1>
        <form action="{{ route('actualite.update', $actualite->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="">Titre</label>
                    <input type="text" name="titre" id="" value="{{$actualite->titre}}" placeholder="Titre de votre actualite" class="form-control @error('titre') is-invalid @enderror">
                    @error('titre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="">Sous-titre</label>
                    <input type="text" name="description" id="" value="{{$actualite->sous_titre}}" placeholder="Sous-titre de votre actualite" class="form-control @error('description') is-invalid @enderror">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="">Categorie</label>
                    <select name="category" class="form-control" id="">
                        @foreach ($categorie as $items)
                            <option value="{{ $items->id }}">{{ $items->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 pb-1">
                <button class="btn btn-success text-light" type="submit">Modifier l'actualite</button>
            </div>
        </form>
    </div>
@endsection
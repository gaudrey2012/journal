@extends('layouts.dashboard')
@section('content')
    <div class="container card shadow">
        <h1 class="text-center mt-5">Editer cette categorie</h1>
        <form action="{{ route('categorie.update', $categorie->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Titre</label>
                    <input type="text" name="title" id="" value="{{$categorie->title}}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="">Sous-titre</label>
                    <input type="text" name="subtitle" id="" value="{{$categorie->subtitle}}" class="form-control @error('subtitle') is-invalid @enderror">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 pb-1">
                <button class="btn btn-success text-light" type="submit">Modifier la categorie</button>
            </div>
        </form>
    </div>
@endsection
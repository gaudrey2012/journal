@extends('layouts.dashboard')
@section('content')
    <div class="container card shadow">
        <h1 class="text-center mt-5">Poster un nouvel Utilisateur</h1>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            @method('post')
            <div class="row justify-content-center ">
                <div class="form-group col-11">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" placeholder="Titre de l'utlisateur" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" id="" placeholder="Email de l'utilisateur" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Role</label>
                    <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" id="" placeholder="Mot de passe de l'utilisateur" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 pb-1">
                <button class="btn btn-success text-light" type="submit">Poster l'utilisateur</button>
            </div>
        </form>
    </div>
@endsection
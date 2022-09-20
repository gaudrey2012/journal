@extends('layouts.dashboard')
@section('content')
    <div class="container card shadow">
        <h1 class="text-center mt-5">Editer cet utilisateur</h1>
        <form action="{{ route('user.update', $user->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
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
                    <input type="email" name="email" value="{{$user->email}}" id="" class="form-control @error('email') is-invalid @enderror">
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-11">
                    <label for="" class="form-label">Role</label>
                    <select name="role" value="{{$user->role}}" id="" class="form-control @error('role') is-invalid @enderror">
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
                    <input type="password" name="password" id="" value="{{$user->password}}" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           
            <div class="d-flex justify-content-center mt-5 pb-1">
                <button class="btn btn-success text-light" type="submit">Modifier cet utilisateur</button>
            </div>
        </form>
    </div>
@endsection
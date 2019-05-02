@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Editar Usuario : {{ $user->name }}</b>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('usuario/' . $user->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" name="name" class="form-control" id="nombre" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                            </div>
                            <hr>
                            <h4>Lista de Roles</h4>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach ($roles as $rol)
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="roles[]" class="custom-control-input" id="{{ 'rol' . $rol->id }}" value="{{ $rol->id }}">
                                                <label class="custom-control-label" for="{{ 'rol' . $rol->id }}">{{ $rol->name }} ( {{ $rol->description ? : 'Sin Descripcion' }} )</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>                
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Crear Rol</b>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update' , $role->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" name="name" class="form-control" id="nombre" value="{{ $role->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">URL Amigable</label>
                                <input type="text" name="slug" class="form-control" id="email" value="{{ $role->slug }}">
                            </div>
                            <div class="form-group">
                                <label for="des">Descripcion</label>
                                <textarea name="description" class="form-control" id="des"  cols="30" rows="10">{{ $role->description }}</textarea>
                            </div>
                            <hr>
                            <label><b> Especial </b></label>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="at" name="special" value="all-access">
                                    <label class="custom-control-label" for="at">Acceso Totoal</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="sa" name="special" value="no-access">
                                    <label class="custom-control-label" for="sa">Sin Acceso</label>
                                </div>
                            </div>
                            <hr>
                            <h4>Lista de Permisos</h4>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach ($permissions as $permission)
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ 'rol' . $permission->id }}" value="{{ $permission->id }}">
                                                <label class="custom-control-label" for="{{ 'rol' . $permission->id }}">{{ $permission->name }} ( {{ $permission->description ? : 'Sin Descripcion' }} )</label>
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
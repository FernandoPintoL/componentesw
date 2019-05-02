@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Lista de  Permisos 
                        @can('privilegios.create')
                            <a href = "{{ route('privilegios.create') }}" class= "btn btn-sm btn-primary pull-right">Crear</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>URLs</th>
                                <th>Description</th>
                                <th colspan="3">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td width="10px">
                                            <a href = "{{ route('privilegios.edit', $permission->id) }}" class= "btn btn-info mr-1">Editar</a>
                                        </td>
                                        <td width="10px">
                                            <form action="{{ route('privilegios.destroy',$permission->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>                            
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection
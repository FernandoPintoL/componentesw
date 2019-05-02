@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Roles 
                        @can('roles.create')
                            <a href = "{{ route('roles.create') }}" class= "btn btn-sm btn-primary pull-right">Crear</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th colspan="3">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->id }}</td>
                                        <td>{{ $rol->name }}</td>
                                        <td width="10px">
                                            <a href = "{{ route('roles.edit', $rol->id) }}" class= "btn btn-info mr-1">Editar</a>
                                        </td>
                                        <td width="10px">
                                            {{-- <a href = "{{ url('roles/' . $rol->id) }}" class= "btn btn-danger">Eliminar</a> --}}
                                            <form action="{{ route('roles.destroy',$rol->id) }}" method="POST">
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
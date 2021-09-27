@extends('adminlte::page');

@section('title', 'Blog autoadministrable')

@section('content_header')

    <a class="btn btn-secondary float-right" href="{{ route('admin.roles.create') }}">Nuevo rol</a>
    <h1>Lista de Roles</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width='10px'>
                                <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
                            </td>
                            <td width='10px'>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

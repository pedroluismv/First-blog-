@extends('adminlte::page');

@section('title', 'Blog autoadministrable')

@section('content_header')
    <h1>Listado de Categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        @can('admin.categories.create')
            <div class="card-header">
                <a class="btn btn-secondary" href="{{ route('admin.categories.create') }}"> Agregar categoria</a>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category) }}">Editar
                                    </a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
@stop

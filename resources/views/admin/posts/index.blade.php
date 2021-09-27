@extends('adminlte::page');

@section('title', 'Blog autoadministrable')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('admin.posts.create') }}">Nuevo post</a>
    <h1>Listado de posts</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @livewire('admin.posts-index')
@stop


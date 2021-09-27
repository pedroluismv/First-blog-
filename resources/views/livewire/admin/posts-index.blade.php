<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del post" type="text">
    </div>

    @if ($posts->count())


        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Name</td>
                        <th colspan="2">
                            </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td width='10px'><a class="btn btn-primary"
                                    href="{{ route('admin.posts.edit', $post) }}">Editar</a></td>
                            <td width='10px'>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
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
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro asociado</strong>
        </div>
    @endif
</div>

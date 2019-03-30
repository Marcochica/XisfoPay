<form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post" style="display:inline-block;">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></button>
</form>

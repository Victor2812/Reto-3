<form action="{{ $route }}" method="POST" class="delete-form">
    @method('DELETE')
    @csrf
    <button class="btn" type="submit" value="Eliminar">
        <i class="bi bi-trash3"></i>
    </button>
</form>
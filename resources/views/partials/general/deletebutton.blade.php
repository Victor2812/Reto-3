<form action="{{ $route }}" method="POST" clas="delete-form">
    @method('DELETE')
    @csrf
    <input type="submit" value="Eliminar">             
</form>
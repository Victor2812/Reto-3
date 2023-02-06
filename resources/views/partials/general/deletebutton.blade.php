<form action="{{ $route }}" method="POST" clas="delete-form">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn">
        <i class="bi bi-trash3"></i>
    </button>     
</form>
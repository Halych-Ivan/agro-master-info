<form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="import_file">
    <button type="submit">Імпортувати</button>
</form>

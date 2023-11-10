<form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
    <input type="file" name="import_file">
    <br>
    <div>
        <input type="radio" name="type" value="students">
        <label for="3">Students</label>
    </div>
    <div>
        <input type="radio" name="type" value="subjects">
        <label for="2">Subjects</label>
    </div>

    <br>
    <button type="submit">Імпортувати</button>
</form>

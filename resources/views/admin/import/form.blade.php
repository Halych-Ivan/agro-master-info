<form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
    <div>
        <input type="file" name="import_file">
    </div>
    <div>
        <input id="levels" value="levels" type="radio" name="type">
        <label for="levels">levels</label>
    </div>
    <div>
        <input id="specialties" value="specialties" type="radio" name="type">
        <label for="specialties">specialties</label>
    </div>
    <div>
        <input id="programs" value="programs" type="radio" name="type">
        <label for="programs">programs</label>
    </div>
    <div>
        <input id="cathedras" value="cathedras" type="radio" name="type">
        <label for="cathedras">cathedras</label>
    </div>
    <div>
        <input id="teachers" value="teachers" type="radio" name="type">
        <label for="teachers">teachers</label>
    </div>
    <div>
        <input id="groups" value="groups" type="radio" name="type">
        <label for="groups">groups</label>
    </div>
    <div>
        <input id="students" value="students" type="radio" name="type">
        <label for="students">students</label>
    </div>
    <div>
        <input id="subjects" value="subjects" type="radio" name="type">
        <label for="subjects">subjects</label>
    </div>

    <div>
        <input id="tolerances" value="tolerances" type="radio" name="type">
        <label for="tolerances">tolerances</label>
    </div>



    <br>
    <button type="submit">Імпортувати</button>
</form>

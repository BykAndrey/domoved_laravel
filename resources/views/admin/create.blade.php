<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="title">Title</label>
    <input type="text" name="title"><br>

    <label for="title">Meta</label>
    <input type="text" name="metaDesc"><br>

    <label for="title">Desc</label>
    <input type="text" name="description"><br>

    <label for="title">active</label>
    <input type="checkbox" name="active"><br>

    <label for="title">Url</label>
    <input type="text" name="url"><br>

    <label for="title">active</label>
    <input type="file" name="image"><br>

    <input type="submit">
</form>
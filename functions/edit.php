<?php require '../templates/header.php'; ?>

<h1>Edit Task</h1>

<form action="edit.php" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" required>
    <br>    <br>

    <label for="description">Description</label>
    <input type="text" name="description" placeholder="Description" required>
    <br>    <br>

    <button type="submit">Update Task</button>
</form>

<?php require '../templates/footer.php'; ?>
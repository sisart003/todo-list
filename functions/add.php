<?php 
    require '../templates/header.php'; 
    require '../crud/dbconnect.php';
    require '../crud/crud.php';
?>

<?php
    $database = new Database();
    $db = $database->getConnection();
    $task = new Tasks($db);

    // Handle Create Form Submission
    if (isset($_POST['create'])) {
        $title = htmlspecialchars(trim($_POST['title']));
        $description = htmlspecialchars(trim($_POST['description']));

        if ($title && $description) {
            if ($task->create($title, $description)) {
                echo "<script>alert('Task added!')</script>";
                header("Location: http://localhost/todo-list");
            } else {
                echo "<script>alert('Task failed!')</script>";
            }
        } else {
            echo "<script>alert('Invalid Input!')</script>";
        }
    }

?>

<h1>Add Task</h1>

<form action="" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" required>
    <br><br>

    <label for="description">Description</label>
    <textarea name="description" id="description" placeholder="Description" rows="5" cols="20"></textarea>
    <br><br>

    <button type="submit" name="create">Add Task</button>
</form>

<?php require '../templates/footer.php'; ?>
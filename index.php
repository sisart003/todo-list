
<?php
    require './crud/dbconnect.php';
    require './crud/crud.php';
    require './templates/header.php';


    $database = new Database();
    $db = $database->getConnection();
    $task = new Tasks($db);

    // Handle Delete Request
    if(isset($_POST['delete'])) {
        $id = intval($_POST['delete']);
        if ($task->delete($id)) {
            header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page
        } else {
            echo "<p>Failed to delete task.</p>";
        }
    }
?>

    <nav>
        <h1>Todo List</h1>
        <p><a href="./functions/add.php">Add Task</a></p>
    </nav>
    <hr>
    <div>
        <?php
        
            $tasks = $task->read();
            foreach($tasks as $taskList):
        ?>
        <div>
            <h2><?= $taskList['title']; ?></h2>
            <p><?= $taskList['description']; ?></p>
            <p><a href="<?= 'http://localhost/todo-list/functions/edit.php/'.$taskList['id']; ?>">Edit</a></p>
            <p>
                <form action="" method="post" style="display:inline">
                    <button type="submit" name='delete' value="<?= $taskList['id']; ?>">Delete</button>
                </form>
            </p>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>
    
<?php require './templates/footer.php'; ?>
<!-- Display todos -->
<?php include_once("../classes/todo.class.php"); ?>

<div class="wrapper">
    <button class="add-todo-btn"><a href="index.php?pages=add_todo"><i class="fas fa-plus fa-fw"></i>Add Todo</a></button>
    <section class="display-todos">
        <table class="todos-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user']['id'];
                $todos = new Todo();
                if (is_array($todos->getAllTodos($user_id))) {
                    $cnt = 1;
                    foreach ($todos->getAllTodos($user_id) as $todo) { ?>
                        <tr>
                            <td><?= $cnt ?></td>
                            <td><?= $todo['todo_title'] ?></td>
                            <td><?= $todo['todo'] ?></td>
                            <td><?= $todo['todo_date'] ?></td>
                            <td><a href="index.php?pages=todos&todo_id=<?= $todo['todo_id'] ?>">Delete</a></td>
                        </tr>
                <?php $cnt++;
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</div>

<?php
include_once("../classes/todo.class.php");
$user_id = $_SESSION['user']['id'];
$todo = new Todo();


// Deleting todo

if (isset($_GET['todo_id'])) {
    $todo_id = $_GET['todo_id'];
    $todo->deleteTodo($user_id, $todo_id);
    header("Location: ../dashboard/index.php?pages=todos");
    exit;
}
?>
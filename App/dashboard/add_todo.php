<section class="add-todo">
    <form action="../process/todo_process.php" method="post" id="add-todo-form">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Task title" id="firstname" required>
        </div>
        <div class="form-group">
            <label for="todo">Task</label>
            <textarea name="todo" id="todo" cols="30" rows="10" placeholder="Enter your task here..."></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
        </div>
        <button type="submit" name="submit-todo" id="todo-submit-btn">
            <i class="fas fa-location-arrow fa-fw link-icon"></i>&nbsp;Submit
        </button>

    </form>
</section>
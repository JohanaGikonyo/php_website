<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="time">Time</label><br>
        <input type="text" id="time" name="time"><br>
        <label for="task">Enter Task</label><br>
        <input type="text" id="task" name="task"><br>
        <button type="submit" name="add">Add Task</button>
        <button type="submit" name="delete">Delete Task</button>
        <button type="submit" name="clear">Clear All Tasks</button>
    </form>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['list_tasks'])) {
    $_SESSION['list_tasks'] = array();
}
$task = $_POST['task'];
$time = $_POST['time'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    if ($_SESSION['list_tasks'] === null || $task === "" || $time === "") {
        echo "<strong>Please enter a task and time </strong>";
    } else {
        $_SESSION['list_tasks'][$time] = $task;
        echo "<ul>";
        foreach ($_SESSION['list_tasks'] as $time => $task) {
            echo "<li>In the <strong>{$time}</strong> You have to  <strong>$task</strong></li>";
        }
        echo "</ul>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    if ($_SESSION['list_tasks'] === null || $task === "" || $time === "") {
        echo "<strong>Please enter a task and time </strong>";
    } else {
        unset($_SESSION['list_tasks'][$time]);
        echo "<ul>";
        foreach ($_SESSION['list_tasks'] as $time => $task) {
            echo "<li>In the <strong>{$time}</strong> You have to  <strong>$task</strong></li>";
        }
        echo "</ul>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
    $_SESSION['list_tasks'] = array();
    echo "<strong>All tasks cleared</strong>";
}

?>
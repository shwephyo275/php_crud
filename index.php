<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Form</title>
</head>
<body>

<a href="./read.php" style="margin-bottom:20px;display:block;">list Page</a>


    <form method="post">
        <h1>To Do List</h1>
        <div class="form-group">
            <label for="textName">Text Name</label>
            <input type="text" name="taskName" id="" placeholder="Enter Task..." required>
            <button name="addBtn">Add</button>
        </div>
    </form>

<?php
    require_once("./db_connection.php");

    if(isset($_POST['addBtn'])){
        $taskName = $_POST['taskName'];
        $sql = "INSERT INTO work (name) VALUES ('$taskName')";
        
        if($taskName != '' || $taskName != null) {
            if(mysqli_query($conn, $sql)){
                header("location:read.php");
            }else {
                echo "Query Fail..." . mysqli_error();
            }
        }else {
            echo '<small style="color:red;">Please, fill the task name...</small>';
        }
    }
?>
</body>
</html>
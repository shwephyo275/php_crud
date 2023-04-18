<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    // Get Data => Show => Edit => Update

    require_once('db_connection.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM work WHERE id = $id";
    $query = mysqli_query($conn, $sql); 

    // echo "<pre/>";
    //  print_r(mysqli_fetch_assoc($query));
    $data = mysqli_fetch_assoc($query);// get data  

    if(isset($_POST['updateBtn'])){
        $id = $_POST['textID'];
        $taskName = $_POST['taskName'];

        // if($taskName == "" || $taskName == null){
        //     echo '<small style="color:red;">Task Name is required!</small>';
        // }else {
            $updateSQL = "UPDATE work SET name ='$taskName' WHERE id = $id";
            if(mysqli_query($conn, $updateSQL)){
                header("location:read.php");
            }else{
                echo "Update error...";
            };  

    }
?>

    <a href="read.php">List page</a><br><br>

    <form method="post">
        Tasks
        <input type="hidden" name="textID" value="<?php echo $data['id']; ?>" required>
        <input type="text" name="taskName" value="<?php echo $data['name']; ?>" required>
        <button name="updateBtn">Update</button>
    </form>
</body>
</html>
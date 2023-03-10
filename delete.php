<?php 
    if(isset($_GET['delete_task'])){
        $id = $_GET['id'];

        require "config/config.php";
        require "config/db.php";
     

        $query_delete = "DELETE FROM tasks WHERE id = $id";
        $result = mysqli_query($conn, $query_delete);
    }
    header("Location: index.php");
    exit;
   ?>k
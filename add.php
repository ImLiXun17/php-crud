<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<style>
    body{
      margin: auto;
      padding: auto;

    }
    .col-md-12{
        width: 350px;
        padding: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-top: 100px;
        margin-left:400px;
        margin-right:400px;
        border-radius:15px;
    }
    .form-group{
        margin: 10px;

    }
    #submit{
        margin-top: 10px;
        margin-left: 130px;
        padding: 7px 10px;
        background-color:green;
        border:none;
        border-radius: 5px;
        color:white;
    }
    #submit:hover{
        background-color:#ABD5AB;
        color:black;
    }
    .btn-back{
        width: 40px;
        margin-top: 10px;
        margin-left: 130px;
        padding: 7px 10px;
        background-color:green;
        border:none;
        border-radius: 5px;
        text-align:center;
    }
.btn-back a{
    color:white;
    text-decoration:none;
}
</style>
<body>
<?php
require "config/config.php";
require "config/db.php";

$query = "SELECT id,task_name FROM tasks";
        $tasks = mysqli_query($conn, $query);
        if(isset($_POST['submit'])){
            $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
            $task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
            $task_due_date = mysqli_real_escape_string($conn, $_POST['task_due_date']);
            $task_status = mysqli_real_escape_string($conn, $_POST['task_status']);

            $query_insert = "INSERT INTO tasks(task_name, task_description, task_due_date, task_status) 
            values('$task_name', '$task_description', '$task_due_date', '$task_status')";
            header("Location: http://localhost/task/success.php");

            if(mysqli_query($conn, $query_insert)){
            }else{
                echo "ERROR: " . mysqli_error($conn); 
            }

            mysqli_close($conn);

            
        }


?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

    <div class="col-md-12">
         <div class="form-group">
             <label>Task Name</label>
             <input type="text" class="form-control" name="task_name">
             </div>
         <div class="form-group">
             <label>Task Description</label>
              <input type="text" class="form-control" name="task_description">
             </div>
         <div class="form-group">
             <label>Task Due Date</label>
              <input type="date" class="form-control" name="task_due_date">
             </div>
         <div class="form-group">
             <label>Task Status</label>
              <select class="form-control" name="task_status">
                 <option>Complete</option>
                 <option>Incomplete</option>
                 <option>In Progress</option>
    </select>
             </div>
             <input type="submit" name="submit" id="submit" value="Submit" >
             <div class = 'btn-back'> 
            <a name ="back" href = "index.php">back</a>
            </div>
            </td>
             <div class="clearfix"></div>
</div>
            
   </form>  
    
</body>
</html>
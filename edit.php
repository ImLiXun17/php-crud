<?php
require "config/config.php";
require "config/db.php";

$id = $_GET['id'];
$query_Id = "SELECT * FROM tasks WHERE id=$id";
$result_Id = mysqli_query($conn, $query_Id);
 if(count(array($result_Id))==1){
            $tasks = mysqli_fetch_array($result_Id);
            $id =$tasks['id'];
            $task_name =$tasks['task_name'];
            $task_description=$tasks['task_description'];
            $task_due_date =$tasks['task_due_date'];
            $task_status =$tasks['task_status'];
 }
 mysqli_free_result($result_Id);

//check if submitted
if(isset($_POST['submit'])){
    //get the data
    $task_name = mysqli_real_escape_string($conn,$_POST['task_name']);
    $task_description = mysqli_real_escape_string($conn,$_POST['task_description']);
    $task_due_date= mysqli_real_escape_string($conn,$_POST['task_due_date']);
    $task_status = mysqli_real_escape_string($conn,$_POST['task_status']);
//create insert query 
$update_query= "UPDATE tasks SET task_name = '$task_name', task_description = '$task_description', task_due_date ='$task_due_date', task_status = '$task_status'
WHERE id = $id";
header("Location: http://localhost/task/done.php");

// execute query 
if(mysqli_query($conn, $update_query)){


}else{
    echo "ERROR: ".mysqli_error($conn);


}
mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tasks</title>
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

</style>
<body>
<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <div class="col-md-12">
         <div class="form-group">
             <label>Task Name</label>
             <input type="text" class="form-control" name="task_name"value="<?php echo $task_name; ?>">
             </div>
         <div class="form-group">
             <label>Task Description</label>
              <input type="text" class="form-control" name="task_description"value="<?php echo $task_description; ?>">
             </div>
         <div class="form-group">
             <label>Task Due Date</label>
              <input type="date" class="form-control" name="task_due_date"value="<?php echo $task_due_date; ?>">
             </div>
         <div class="form-group">
             <label>Task Status</label>
              <select class="form-control" name="task_status">
                 <option value="Complete"<?php if($tasks['task_status']=='Complete') echo 'selected="selected"'; ?>>Complete</option>
                 <option value="Incomplete" <?php if($tasks['task_status']=='Incomplete') echo 'selected="selected"'; ?>>Incomplete</option>
                 <option value="In Progress" <?php if($tasks['task_status']=='In Progress') echo 'selected="selected"'; ?>>In Progress</option>
</select>
             </div>
             <input type="submit" name="submit" id="submit" value="Save">
             <div class="clearfix"></div>
</div>
            
   </form>  
    
</body>
</html>
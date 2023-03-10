<?php
     
     require "config/config.php";
     require "config/db.php";

     if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = mysqli_query($conn, "DELETE FROM tasks WHERE id =$id");
     }
    
     
     $query = "SELECT * FROM tasks";
     $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<style>
.add-btn a{
    padding: 7px 10px;
    border: none;
    text-decoration: none;
    background-color: #0583d2;
    color: white;
    margin-left: 440px;
    border-radius: 3px;
}
.add-btn a:hover{
    background-color: #add8e6;
    color:black;
}
.btn-delete {
    padding: 7px 10px;
    border: none;
    background-color: red;
}
.btn-delete a{
    text-decoration: none;
    color: white;
}
.btn-delete:hover{
    background-color: #a9a9a9;
}
.btn-delete:hover a{
    color:black;
}
.btn-edit {
    padding: 7px 15px;
    border: none;
    background-color: #ec9006;
}
.btn-edit a{
    text-decoration: none;
    color: white;
}
.btn-edit:hover{
    background-color: #a9a9a9;
}
.btn-edit:hover a{
    color:black;
}
.table{
    background-color:#fff;
    text-align: center;
    margin-left:auto;
    margin-right:auto;
}
.container{
    text-align:center;
}
.btn-search{
    background-color: #0583d2;
    color:white;
    border:none;
    padding: 4px 7px;
    border-radius:5px;
}
</style>
<body>
<div class="container">
    <h2>List of Tasks</h2>
    <p>Here is a table for List of Task</p>
    <form action="search_result.php" method="GET">
            <select class="form-control" name="task_status">
                 <option value="Complete">Complete</option>
                 <option value="Incomplete">Incomplete</option>
                 <option value="In Progress">In Progress</option>
            </select>
            <input type="submit" value="search" class ="btn-search"/>
     </form>

    <div class="add-btn">
    <a href="add.php" role="button">Add</a>
    </div>
    <br>
    <table class="table" border="1">
        <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Task Due Date</th>
            <th>Task Status </th>
            <th colspan = "2">Action</th>
        </tr>
 <?php
    $num = mysqli_num_rows($result);
    if($num>0){
    while($row = mysqli_fetch_assoc($result)){
        echo
         "<tr>
        <td>".$row['id']."</td>
        <td>".$row['task_name']."</td>
        <td>".$row['task_description']."</td>
        <td>".$row['task_due_date']."</td>
        <td>".$row['task_status']."</td>
        <td>
        <div class = 'btn-delete'>
            <a  name ='delete_task' href = 'index.php?id=$row[id]'>Delete</a>
            </div
            </td>
            <td>
            <div class = 'btn-edit'> 
            <a name ='edit_task' href = 'edit.php?id=$row[id]'>Edit</a>
            </div>
            </td>
    </tr>";
    }
    }
    ?>
    </table>

</div>
</body>
</html>
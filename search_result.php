<?php
include 'config/config.php';
include 'config/db.php';
    global $search;
    global $array;
     if(isset($_GET['task_status'])){
       $search = ($_GET['task_status']);
       $query = mysqli_query($conn, "SELECT * FROM tasks WHERE task_status = '". $search . "'");
       $array = array();
        if (mysqli_num_rows($query)>0){
            while($row=mysqli_fetch_assoc($query)){
                $array[] =$row;
            }
        }
    }

        echo "<div class='container'>
        <h2>List of Tasks</h2>
        <p>Here is a table for List of Task</p>
        <form action='search_result.php' method='GET'>
                <select class='form-control' name='task_status'>
                     <option value='Complete'>Complete</option>
                     <option value='Incomplete'>Incomplete</option>
                     <option value='In Progress'>In Progress</option>
                </select>
                <input type='submit' name ='search' value='search' class ='btn-search'/>
         </form>
    
        <div class='add-btn'>
        <a href='add.php' role='button'>Add</a>
        </div>
        <br>
        <table class='table' border='1'>
            <tr>
                <th>ID</th>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Task Due Date</th>
                <th>Task Status </th>
                <th colspan = '2'>Action</th>
            </tr>
            </div>";
        foreach($array as $rows){
            echo
             "<tr>
            <td>".$rows['id']."</td>
            <td>".$rows['task_name']."</td>
            <td>".$rows['task_description']."</td>
            <td>".$rows['task_due_date']."</td>
            <td>".$rows['task_status']."</td>
            <td>
            <div class = 'btn-delete'>
                <a  name ='delete_task' href = 'index.php?id=$rows[id]'>Delete</a>
                </div
                </td>
                <td>
                <div class = 'btn-edit'> 
                <a name ='edit_task' href = 'edit.php?id=$rows[id]'>Edit</a>
                </div>
                </td>
        </tr>";
        }
?>
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
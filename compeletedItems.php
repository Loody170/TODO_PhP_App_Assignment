<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="stylesheet" href="./style.css">
  <title>My ToDo List App</title>
</head>
  <body>
    <?php 
    // enable mysql error reporting for debugging only
    // $driver = new mysqli_driver();
    // $driver->report_mode = MYSQLI_REPORT_ALL;
    require_once('./db_connection.php');
    require('./insert_todo.php');
    require('./get_todos.php');
    require('./update_todo.php');
    require('./delete_todo.php');
    
    // if the form is submitted by this page
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
         if (isset($_POST['delete_btn'])) {
            // When a checkbox is selected, delete it in the db
            if(!empty($_POST['checkBoxList'])) {
                delete_item($_POST['checkBoxList']);
            }
        }
    }
          
?>

    <div id="content">
        <h1>My ToDo List App</h1>
        <form method="post" id="addForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           <div class="buttons">
              <button type="submit" class="btn" name="delete_btn">Delete</button>
           </div>
           <button id = "completedTasks" class = "btn"><a href="index.php">Show completed items</a></button>
           <?php get_all_done_items();?>
        </form>
    </div>
  </body>
</html>
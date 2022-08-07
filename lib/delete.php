<?php 
    include '../db/config.php';
    
    if(isset($_GET['item'])){
        $item = $_GET['item'];

        $delete = "DELETE 
            FROM peripherals 
            WHERE component_id = '$item'";
        mysqli_query($db, $delete);

        header('location: ../index.php');
    } else if(isset($_GET['set'])){
        $set = $_GET['set']; 

        $delete_assignee = "UPDATE employees
            SET set_id = 0
            WHERE set_id = '$set'";
            
        mysqli_query($db, $delete_assignee);

        $delete_set = "DELETE 
            FROM set_bundle 
            WHERE set_id = '$set'";
        mysqli_query($db, $delete_set);

        header('location: ../index.php');
    } else if (isset($_GET['employee'])){
        $employee = $_GET['employee'];

        $delete = "DELETE 
            FROM employees 
            WHERE id = '$employee'";
        mysqli_query($db, $delete);

        header('location: ../employee.php');
    }
?>
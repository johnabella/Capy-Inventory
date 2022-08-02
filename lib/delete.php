<?php 
    include '../config/db/index.php';
    
    if(isset($_GET['item'])){
        $item = $_GET['item'];

        $delete = "DELETE FROM peripherals WHERE component_id = '$item'";
        mysqli_query($db, $delete);

        header('location: ../index.php');
    } else if(isset($_GET['set'])){
        $set = $_GET['set'];

        $delete = "DELETE FROM set_bundle WHERE set_id = '$set'";
        mysqli_query($db, $delete);

        header('location: ../index.php');
    }
?>
<?php
    include '../db/config.php';

    if(isset($_POST['editItem'])){
        $item = $_POST['item'];
        $brand = $_POST['brand'];
        $unit = $_POST['unit'];
        $serial = $_POST['serial'];
        $purchaseDate = $_POST['purchaseDate'];
        $set = $_POST['set']; 

        $update_query = "UPDATE peripherals 
            SET brand = '$brand',
                unit = '$unit',
                serial_number = '$serial',
                purchase_date = '$purchaseDate',
                set_id = '$set'
            WHERE component_id = '$item'";
        mysqli_query($db, $update_query);
        header('location: ../index.php');
    } else if(isset($_POST['editSet'])){

        $setID = $_POST['setID'];
        $set = $_POST['set'];
        $empID = $_POST['empID'];
        $assignee = $_POST['assignee'];

        if($empID == $assignee){ // ignored if selected == previous
            header('location: ../index.php');
        } else {
            $set_selected = "UPDATE employees 
                SET set_id = '$setID'
                WHERE id = '$assignee'";
            mysqli_query($db, $set_selected);

            $set_previous = "UPDATE employees 
                SET set_id = 0
                WHERE id = '$empID'";
            mysqli_query($db, $set_previous);

            header('location: ../index.php');
        }
    }   
?>
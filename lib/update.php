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
        echo 'setid: ';
        echo $setID = $_POST['setID'];
        echo '<br>';
        echo 'set: ';
        echo $set = $_POST['set'];
        echo '<br>';
        echo 'empid: ';
        echo $empID = $_POST['empID'];
        echo '<br>';
        echo 'asignee: ';
        echo $assignee = $_POST['assignee'];
        echo '<br>';
        
        $update_query = "UPDATE employees 
            SET set_id = '$setID',
            WHERE id = '$assignee'";
        mysqli_query($db, $update_query);

    
        header('location: ../index.php');
    }
    
?>
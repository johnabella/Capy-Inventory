<?php 
    include '../config/db/index.php';

    if(isset($_POST['createItem'])){
        $brand = $_POST['brand'];
        $unit = $_POST['unit'];
        $serial = $_POST['serial'];
        $purchaseDate = $_POST['purchaseDate'];
        $set = $_POST['set']; 
    
        $create_query = "INSERT INTO peripherals (brand, unit, serial_number, purchase_date, set_id)
            VALUES ('$brand', '$unit', '$serial', '$purchaseDate', '$set')";
            mysqli_query($db, $create_query);
            header('location: ../index.php');
    } else if(isset($_POST['createSet'])){
        $set = $_POST['newSet'];
    
        $check_set = "SELECT * FROM set_bundle WHERE set_name = '$set' ";
        $result = mysqli_query($db, $check_set);

        if(mysqli_num_rows($result) == 0){
            $create_query = "INSERT INTO set_bundle (set_name)
            VALUES ('$set')";
            mysqli_query($db, $create_query);
            header('location: ../index.php');
        } else {
            header('location: ../index.php?set=' . $set . '');
        }    
    }
?>
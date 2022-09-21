<?php 
    include '../db/config.php';

    if(isset($_POST['createItem'])){
        // Create item
        // echo "item";
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
        // Create set
        $set = $_POST['newSet'];

        $check_set = "SELECT * FROM set_bundle WHERE set_name = '$set' ";
        $result = mysqli_query($db, $check_set);

        if(mysqli_num_rows($result)){
            header('location: ../index.php?set=' . $set . '');
        } else {
            $create_query = "INSERT INTO set_bundle (set_name)
            VALUES ('$set')";
            mysqli_query($db, $create_query);
            header('location: ../index.php');
        }

    } else if(isset($_POST['createEmployee'])){
        // Create employee
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $set = $_POST['set'];

        $create_query = "INSERT INTO employees (firstname, lastname, set_id)
            VALUES ('$firstname', '$lastname', '$set')";
            mysqli_query($db, $create_query);
        header('location: ../employee.php');
    }
?>
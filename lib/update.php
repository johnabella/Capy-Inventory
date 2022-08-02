<?php
    include '../config/db/index.php';

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
?>
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

        if ($_POST['firstname'] && $_POST['lastname'] && $_POST['set']) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $set = $_POST['set'];

            $create_query = "INSERT INTO employees (firstname, lastname, set_id)
                VALUES ('$firstname', '$lastname', '$set')";
            mysqli_query($db, $create_query);
            header('location: ../employee.php');

        } else if($_FILES['empFile']){
            $file_extension = pathinfo($_FILES['empFile']['name'], PATHINFO_EXTENSION);

            if ($file_extension == 'csv') {
                $file = fopen($_FILES['empFile']['tmp_name'],"r"); 

                # Get first column and check column format (firstname, lastname, set)
                $columns = fgetcsv($file);
                if ($columns[0] == 'firstname' && $columns[1] == 'lastname' && $columns[2] == 'set') {
                    while ($newEmployee = fgetcsv($file)) {
                        # Get each column
                        $firstname = $newEmployee[0];
                        $lastname = $newEmployee[1];
                        $set = $newEmployee[2];
                    
                        # Check if set exist in db
                        $check_set = "SELECT * FROM set_bundle WHERE set_name = '$set' ";
                        $check_set_result = mysqli_query($db, $check_set);
    
                        if (mysqli_num_rows($check_set_result)) {
                            # Get set ID
                            $existSetRow = mysqli_fetch_assoc($check_set_result);
                            $existSetid = $existSetRow['set_id'];
    
                            # Check set if assigned
                            $check_set_assigned = "SELECT * FROM employees WHERE set_id = '$existSetid' ";
                            $check_set_assigned_result = mysqli_query($db, $check_set_assigned);
    
                            if (mysqli_num_rows($check_set_assigned_result)) {
                                # Create employee with no set
                                $create_employee = "INSERT INTO employees (firstname, lastname, set_id)
                                VALUES ('$firstname', '$lastname', '0')";
                                mysqli_query($db, $create_employee);
    
                            } else {
                                # Create employee with existing unassigned set
                                $create_employee = "INSERT INTO employees (firstname, lastname, set_id)
                                VALUES ('$firstname', '$lastname', '$existSetid')";
                                mysqli_query($db, $create_employee);
                            }
                        } else {
                            # Create set
                            $create_set = "INSERT INTO set_bundle (set_name)
                            VALUES ('$set')";
                            mysqli_query($db, $create_set);
    
                            # Get new set
                            $get_set = "SELECT * FROM set_bundle WHERE set_name = '$set' ";
                            $get_set_result = mysqli_query($db, $get_set);
                            $getSetRow = mysqli_fetch_assoc($get_set_result);
                            $setid = $getSetRow['set_id'];
    
                            # Create employee with new set
                            $create_employee = "INSERT INTO employees (firstname, lastname, set_id)
                            VALUES ('$firstname', '$lastname', '$setid')";
                            mysqli_query($db, $create_employee);
                        }
                    }
                    header('location: ../employee.php');
                } else {
                    # Invalid column format
                    header('location: ../employee.php');
                }
            } else {
                # If file is not csv
                header('location: ../employee.php');
            }
        } else {
            header('location: ../employee.php');
        }
        
    }
?>
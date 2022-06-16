<?php 

function confirmQuery($result) {
    
     global $conn;
    
    if (!$result) {
        die("Query Failed " . mysqli_error($conn));
    }
}

function escape_string($string) {
    
    global $conn;
    
    return mysqli_real_escape_string($conn, $string);
}

function redirect($string) {

    header("Location: $string");
}

function logout($string) {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_first_name']);
    unset($_SESSION['user_last_name']);
    unset($_SESSION['user_phone']);
    unset($_SESSION['user_email']);
    unset($_SESSION['meter_number']);

	redirect($string);
}

?>
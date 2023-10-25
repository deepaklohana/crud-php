<?php

include('../config/connection.php');

if (isset($_POST["reserve_room"])){

    $customer_name = $_POST["customer_name"];
    $customer_phone = $_POST["customer_phone"];
    $customer_cnic = $_POST["customer_cnic"];
    $room_number = $_POST["room_number"];
    $reservation_date = $_POST["reservation_date"];
    $reservation_duration = $_POST["reservation_duration"];

    $sql = "";
    
    $check = $conn->query("SELECT * FROM reservations WHERE ")

    if($_POST['room_id'] == "") {
        $sql .= $conn->query("INSERT INTO reservations (customer_name, customer_phone, customer_cnic, room_number, reservation_date, reservation_duration) VALUES ('$customer_name', '$customer_phone', '$customer_cnic', '$room_number', '$reservation_date', '$reservation_duration')");
    }
    else{
        $sql .= $conn->query("UPDATE reservations SET customer_name = '$customer_name', customer_phone = '$_customer_phone', customer_cnic = '$_customer_cnic',  room_number = '$room_number', reservation_date = '$reservation_date', reservation_duration = '$reservation_duration' WHERE id = ".$_POST['room_id']); 
    }

    if ($sql) {
        header('Location: ../reservations.php');
    }
    else{
        echo ("Error: " .$sql);
    }
}




    /*if ($check->num_rows > 0) {
        echo "This Room Already Exist";
    }else{
        $sql = $conn->query("INSERT INTO rooms (room_number, room_status) VALUES ('$room_number', '$room_status')");

        if ($sql){
            header('Location: ../rooms.php');
        }
        else{
            echo ("Error: " .$sql);
        }
    }*/
?>
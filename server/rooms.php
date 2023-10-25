<?php

include('../config/connection.php');

if (isset($_POST["add_room"])){

    $room_number = $_POST["room_number"];
    $room_status = $_POST["room_status"];

    $check = $conn->query("SELECT * FROM rooms WHERE room_number = $room_number AND room_status = '$room_status'");

    if ($check->num_rows > 0) {
        echo "This Room Already Exist";
    }
    else{
        $sql = "";

        if($_POST['room_id'] == "") {
            $sql .= $conn->query("INSERT INTO rooms (room_number, room_status) VALUES ('$room_number', '$room_status')");
        }
        else{
            $sql .= $conn->query("UPDATE rooms SET room_number = '$room_number', room_status = '$room_status' WHERE id = ".$_POST['room_id']); 
        }

        if ($sql) {
            header('Location: ../rooms.php');
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
}

?>
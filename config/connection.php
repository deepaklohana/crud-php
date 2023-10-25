<?php
$conn = new mysqli("localhost","root","","hms");
if($conn->connect_error){
    die("connection failed: " .$conn->connect_error);
}
?>
<?php

$sqlcode = "select * from user where (email= '$mail')";
$query = mysqli_query($con, $sqlcode);

while ($row = mysqli_fetch_array($query)) {
    $username = $row['username'];
    $mail = $row['email'];
    $key = $row['recovery'];
}
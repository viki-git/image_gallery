<?php
include "link.php";
$sql = "SELECT password
               FROM users
    WHERE email='".$_POST['email']."' LIMIT 1";
$password = mysqli_query($link, $sql)or die(mysqli_error($link));
if($password)
$password = mysqli_fetch_row($password)[0];
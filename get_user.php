<?php
include "link.php";
$sql = "SELECT email
               FROM users
               WHERE email='".$_POST['email']."'";
$result = mysqli_query($link, $sql)or die(mysqli_error($link));

$isPasswordBusy = $result->num_rows;

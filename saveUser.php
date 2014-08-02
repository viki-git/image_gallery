<?php
include "link.php";
$sql = "INSERT INTO users(email, password)VALUES ('".$_POST['email']."',
'".$md5."') ";
$result = mysqli_query($link, $sql);
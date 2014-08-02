<?php
include "link.php";
$sql = "SELECT id
               FROM users
               WHERE email='".$_POST['email']."'";
$result = mysqli_query($link, $sql)or die(mysqli_error($link));
$id = mysqli_fetch_row($result)[0];

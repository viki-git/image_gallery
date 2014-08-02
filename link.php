<?php
$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
or die("Error " . mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
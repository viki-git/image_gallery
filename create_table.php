<?php
include "link.php";
    $sql = " CREATE TABLE IF NOT EXISTS users(
             `email` text NOT NULL,
             `password` text NOT NULL,
             `id` int(11) NOT NULL AUTO_INCREMENT,
               PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
mysqli_query($link, $sql)or die(mysqli_error($link));
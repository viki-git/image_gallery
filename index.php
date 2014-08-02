<?php
require "config.php";
if (isset($_POST['email']) && (isset($_POST['password']))) {
    include "getUser.php";
    $md5 = md5($_POST['password']);
    if ($password == $md5) {
        session_start();
        include "get_id.php";
        $_SESSION['id'] = $id;
        header("Location: ".PATH."/image_gallery/upload.php");
    } else {

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>image_gallery</title>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="script/jquery.filter_input.js"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav navbar-center">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Image Gallery</a>
            </div>
    </ul>
</nav>
<div class="container">
    <form method="post" role="form" action="#">
        <script>
            $(function(){
                $('#exampleInputEmail1').filter_input({regex:'[а-яА-Я@a-zA-Z0-9_]'});
            });
        </script>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                   placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Войти</button>
            <a href="registration.php">
                <button type="button" class="btn btn-info">Регистрация</button>
            </a>
        </div>
    </form>
</div>
</body>
</html>
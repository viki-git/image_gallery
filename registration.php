<?php
include "create_table.php";
require "config.php";
if(isset($_POST['email'])&& isset($_POST['password'])&&!empty($_POST['email'])&& !empty($_POST['password'])){
    include "get_user.php";
    if(!$isPasswordBusy){
        $pass = $_POST['password'];
        $md5 = md5($pass);
        include "saveUser.php";
        include "get_id.php";
        $dir = "img/".$id;
        mkdir($dir, 0777, true);
        header('Location: index.php');
    }else{
        echo "Такой пользователь уже существует";
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="#">Image Gallery</a>
            </div>
    </ul>
</nav>
<a href="index.php"><button type="button" class="btn btn-info"><-Войти</button></a>
<div class="container">
    <script>
        
    </script>
    <form role="form" method="post" action="#">
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
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <a href="gallery.php"><button type="submit" class="btn btn-primary">Зарегестрироваться</button></a>
        </div>
    </form>
</div>
</body>
</html>


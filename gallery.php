<?php
    require "config.php";
session_start();
if (isset($_FILES["filename"])) {
    if ($_FILES["filename"]["size"] > 1024 * 3 * 1024) {
        echo("Размер файла превышает три мегабайта");
        exit;
    }
    if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
        move_uploaded_file($_FILES["filename"]["tmp_name"], "img/" . $_SESSION['id'] .
            '/' . $_GET['name'] . '/' . $_FILES["filename"]["name"]);
    } else {
        echo("Ошибка загрузки файла");
    }
}

if (isset($_GET['catalog'])) {
    $dir = "img/" . $_SESSION['id'] . '/' . $_GET['catalog'] . '/';
    mkdir($dir, 0644, true);
}

if(isset($_GET['del'])){
    $d = "img/" . $_SESSION['id'] . '/' . $_GET['cat'].'/'. $_GET['del'];
    unlink($d);
}

if(isset($_GET['exit'])){
    unset($_SESSION["id"]);
    header("Location: ".PATH."/image_gallery/index.php");
}
?><!DOCTYPE html>
<html>
<head>
    <title>image_gallery</title>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
    <script src="script/lightbox/js/lightbox.min.js"></script>
    <link href="script/lightbox/css/lightbox.css" rel="stylesheet" />
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
    <ul class="nav navbar-nav navbar-right">
        <li><a href="gallery.php?exit">Выход</a></li>
    </ul>
</nav>
<div class="container">
    <div class="alert alert-success">
             <h2><p><b> Форма для загрузки файлов </b></p></h2>
            <form action="gallery.php?name=<?php echo $_GET['name']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input  type="file" name="filename" id="exampleInputFile">
                 </div>
                <input class="btn btn-default" type="submit" value="Загрузить">
            </form>
    </div>
    <div class="alert alert-success">
        <div class="row">
            <div class="section">
                <div class="gallery">
                    <ul class="images">
                        <li class="image">
            <?php
            $dir = "img/" . $_SESSION['id'] . '/' . $_GET['name'].'/';
            $photos = scandir($dir);
            unset($photos[0]);
            unset($photos[1]);
            foreach($photos as $photo)
                echo "
                <div class='col-xs-6 col-sm-3'>
            <a data-lightbox='".$_GET['name']."' href='".$dir."/".$photo."'>
                <img width='200' height='200' src='".$dir."/".$photo."' class='img-circle'>
            </a>
            <a href='gallery.php?del=".$photo."&cat=".$_GET['name']."&name=".$_GET['name']."'> &cross;</a>
                </div>
    ";
            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body></html>
<?php
require "config.php";
session_start();
if (isset($_GET['catalog'])&&!empty($_GET['catalog'])) {
    $dir = "img/" . $_SESSION['id'] . '/' . $_GET['catalog'] . '/';
    mkdir($dir, 0770, true);
}
if(isset($_GET['name'])){
    $d = "img/" . $_SESSION['id'] . '/' . $_GET['name'];
    rmdir($d);
}
if(isset($_GET['exit'])){
    session_destroy();
    header("Location: ".PATH."/image_gallery/index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
    <ul class="nav navbar-nav navbar-right">
        <li><a href="upload.php?exit">Выход</a></li>
    </ul>
</nav>
<div class="container">
    <form role="form" action="#">
            <div class="alert alert-success">
                <h2><p><b>Добавить галерею</b></p></h2>
                    <div class="form-group">
                        <script>
                            $(function(){
                                $('#namef').filter_input({regex:'[а-яА-Яa-zA-Z0-9_]'});
                            });
                        </script>
                        <input name="catalog" class="form-control" id="namef" type="text" placeholder="Введите название галереи">
                    </div>
                <input type="submit" class="btn btn-default" value="Добавить">
            </div>
    </form>
    <div class="alert alert-success">
        <h2><b>Галереи</b></h2>
        <?php
        if(file_exists('img')== false)
            mkdir('img', 0770, true);
             $dir = "img/" . $_SESSION['id'];
             if(scandir($dir)!= false) {
             $catalogs = scandir($dir);
                unset($catalogs[0]);
             unset($catalogs[1]);
              foreach ($catalogs as $catalog)
                echo "<ul><li><a href='gallery.php?name=" . $catalog . "'>" . $catalog . "</a><a href='upload.php?name=" . $catalog . "'> &cross;</a></li></ul>";
        }else {echo "У Вас еще нет созданых галерей";}
        ?>
    </div>
    <?php
    if (isset($_FILES["filename"])) {
        if ($_FILES["filename"]["size"] > 1024 * 3 * 1024) {
            echo("Размер файла превышает три мегабайта");
            exit;
        }
        if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
            move_uploaded_file($_FILES["filename"]["tmp_name"], "img/" . $_SESSION['id'] . '/' . $_FILES["filename"]["name"]);
        } else {
            echo("Ошибка загрузки файла");
        }
    }
    ?>
    </div>
</div>
</body>
</html>

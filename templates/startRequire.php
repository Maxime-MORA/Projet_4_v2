<?php 
session_start();
$_SESSION["link"] = 'http://projet-4.maximemora.com/';
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = 0
};
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="./app/img/fav.ico" />
    <link rel="stylesheet" type="text/css" href="./app/css/style.css" />
    <link rel="stylesheet" type="text/css" href="./app/css/bootstrap.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=dnl3mquw9cobtzzfrls0a1xfwi6hpdfowzcz8cqsezfrh16x"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <title>
        <?= $title ?>
    </title>
</head>

<body>
<?php
include_once('includes/connect.php');
if ($_SESSION['loged_user']==0)//проверка на авторизацию
    header('Location: ' . 'login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система паспортного учета ФМС</title>
    <link rel="shortcut icon" href="images/icon_ufms.png" type="image/png">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="container col-md-11">
   <?php
   require_once("includes/header_container.php");
   ?>
   <div id="guide_content_container" class="row mt-4">
   <?php
   require_once("includes/left_menu_container.php");
   ?>
   <div id="guide_content" class="col-md-8 rounded border border-dark mb-3 p-5">
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum deserunt, nobis recusandae nostrum explicabo, quaerat, praesentium sapiente placeat unde vel architecto! Consequatur eos fuga fugit nisi, mollitia sunt quod adipisci?
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum deserunt, nobis recusandae nostrum explicabo, quaerat, praesentium sapiente placeat unde vel architecto! Consequatur eos fuga fugit nisi, mollitia sunt quod adipisci?
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum deserunt, nobis recusandae nostrum explicabo, quaerat, praesentium sapiente placeat unde vel architecto! Consequatur eos fuga fugit nisi, mollitia sunt quod adipisci?
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum deserunt, nobis recusandae nostrum explicabo, quaerat, praesentium sapiente placeat unde vel architecto! Consequatur eos fuga fugit nisi, mollitia sunt quod adipisci?
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum deserunt, nobis recusandae nostrum explicabo, quaerat, praesentium sapiente placeat unde vel architecto! Consequatur eos fuga fugit nisi, mollitia sunt quod adipisci?

   </div>
    
</body>
</html>
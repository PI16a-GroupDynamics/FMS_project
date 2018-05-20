<?php
include_once('includes/connect.php');
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
   <div id="user_content_container" class="row mt-4">
   <?php
   require_once("includes/left_menu_container.php");
   ?>
   <div id="user_content" class="col-md-8 rounded border border-dark mb-3">
   <div class="" >
   <img src="images/user_user_photo.png" alt="err" class="img-thumbnail float-right">
   <p class="ml-3 mt-4 p-1 col-md-4"><b>Фамилия:</b> Тестовая_фамилия</p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Имя:</b> Имя: Тестовое_имя</p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Отчество:</b> Тестовое_отчество</p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Пол:</b> Мужской</p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Гражданство:</b> Казах</p>
   <p class="ml-3 mt-2 p-1 col-md-12"><b>Адрес проживания:</b> Казахстан, улицафылоыврпоф, районфыдоарвыпывопл, дом54, кв54</p>
   <p class="ml-3 mt-2 p-1 col-md-6"><b>Удостоверение личности:</b> Паспорт</p>
   <p class="ml-3 mt-2 p-1 col-md-2"><b>Серия:</b> AH</p>
   <p class="ml-3 mt-2 p-1 col-md-3 mb-3"><b>Номер:</b> 547645</p>
   <div class="d-flex mb-3">
   <button type="submit" class="btn btn-outline-dark col-md-3">Изменить</button>
   <button type="submit" class="btn btn-outline-dark col-md-5 offset-md-4">Экспортировать в PDF</button>
   </div>
   </div>
   </div>
   </div>
    
</body>
</html>
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
       <b><h4 align="center">Справка</h4></b><br>
    <p><b>1.  Добавление.</b> Что бы добавить новую запись о пользователе нужно: перейти на страницу добавления, нажав на кнопку добавить.</b> После необходимо заполнить все поля и нажать кнопку сохранить.</p>
    <p><b>2.  Сортировка.</b> Что бы осуществить сортировку данных о пользователей нужно выбрать нужный параметр и вписать нужное вам значение, после нужно нажать на кнопку сортировка.</p>
    <p><b>3.  Поиск.</b> Что бы осуществить поиск в данных о пользователей нужно вписать нужное вам значение, после нужно нажать на кнопку поиск.</p>
    <p><b>4.  Подробная информация о пользователе.</b> Для получения подробной информации о пользователе необходимо нажать на строку пользователя в таблице на главной странице.</p>
    <p><b>5.  Редактирование.</b> Что бы отредактировать данные о пользователе необходимо перейти на страницу с подробной информацией о пользователе и нажать на кнопку редактировать, после чего редактируете информацию и нажимаете на кнопку сохранить.</p>


   </div>
    
</body>
</html>
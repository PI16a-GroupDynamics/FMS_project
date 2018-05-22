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
   <div id="log_content_container" class="row mt-4">
   <?php
   require_once("includes/left_menu_container.php");
   ?>
   <div id="log_content" class="col-md-8 rounded border border-dark mb-3">
   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Логин</th>
      <th scope="col">Начало сессии</th>
      <th scope="col">Конец сессии</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Otffffffffffffffto</td>
      <td>05.04.2018 15:30</td>
      <td>05.04.2018 16:28</td>
    </tr>
    <tr>
      <td>Thornton</td>
      <td>05.04.2018 15:30</td>
      <td>05.04.2018 16:28</td>
    </tr>
    <tr>
      <td>Thornton</td>
      <td>05.04.2018 15:30</td>
      <td>05.04.2018 16:28</td>
    </tr>
    <tr>
      <td>Thornton</td>
      <td>05.04.2018 15:30</td>
      <td>05.04.2018 16:28</td>
    </tr>
    
  </tbody>
</table>
   </div>
    
</body>
</html>
<?php
include_once('includes/connect.php');

if ($_SESSION['loged_user']==0) {//проверка на авторизацию
  header('Location: ' . 'login.php');
  exit();
}
// Запрос на получение информации о клиенте
$query = mysqli_query($link,
  "SELECT serial, number, F_name, L_name, patronymic, gender, Date, nationality, adress, date_register, photo, identification.value AS iden, cities.value AS city, countries.value AS country
  FROM citizen, cities, countries, identification
  WHERE citizen.id = " . $_GET['id'] . " and identification.id = citizen.identification_id and citizen.city_id = cities.id and cities.country_id = countries.id");

$citizen = mysqli_fetch_assoc($query);

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
   <img src=<?php echo $citizen['photo']; ?> alt="err" class="img-thumbnail float-right" width="160" height="160">
   <p class="ml-3 mt-4 p-1 col-md-4"><b>Фамилия:</b> <?php echo $citizen['L_name']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Имя:</b> <?php echo $citizen['F_name']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Отчество:</b> <?php echo $citizen['patronymic']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Дата рождения:</b> <?php echo $citizen['Date']; ?></p> <!--Добавлено-->
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Пол:</b> <?php echo $citizen['gender'] == 1 ? 'Мужской' : 'Женский'; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Гражданство:</b> <?php echo $citizen['nationality']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Страна:</b> <?php echo $citizen['country']; ?></p><!--Добавлено-->
   <p class="ml-3 mt-2 p-1 col-md-4"><b>Город:</b> <?php echo $citizen['city']; ?></p><!--Добавлено-->
   <p class="ml-3 mt-2 p-1 col-md-12"><b>Адрес проживания:</b> <?php echo $citizen['adress']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-6"><b>Удостоверение личности:</b> <?php echo $citizen['iden']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-2"><b>Серия:</b> <?php echo $citizen['serial']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-3"><b>Номер:</b> <?php echo $citizen['number']; ?></p>
   <p class="ml-3 mt-2 p-1 col-md-4 mb-3"><b>Дата регистрации:</b> <?php echo $citizen['date_register']; ?></p><!--Добавлено-->
   <div class="d-flex mb-3">
   <a href="edit.php" class="btn btn-outline-dark col-md-3">Изменить</a>
   <a href="export.php" class="btn btn-outline-dark col-md-5 offset-md-4">Экспортировать в PDF</a>
   </div>
   </div>
   </div>
   </div>
    
</body>
</html>
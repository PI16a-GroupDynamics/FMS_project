<?php
include_once('includes/connect.php');//подключеение к БД
  if ($_SESSION['loged_user']==0)//проверка на авторизацию
header('Location: ' . 'login.php');
  if(isset($_POST['Sorted']))//Сортировка
  {
    if(isset($_POST['M']))
      $W="WHERE Gender=1";
    if(isset($_POST['W']))
    {
      if (strlen($W)==0)
        $W="WHERE Gender=0";
      else
        $W="";
    }
    if(strlen($_POST['old'])!=0)
    {
      if (strlen($W)==0)
      $W = " WHERE ";
      else $W.=" AND ";
    $W.= " Date BETWEEN '".date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')-($_POST['old']+1)))."' AND '".date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')-$_POST['old']))."'";
    }
    if($_POST['cities']!=0)
    {
      if (strlen($W)==0)
        $W = " WHERE ";
      else $W.=" AND ";
        $W.= " city_id = ".$_POST['cities'];
    }
  }
    if(isset($_POST['Search']))//Поиск по фамилии
    {
      if (strlen($_POST['Search_text'])!=0)
      {
        $W="WHERE F_name='".$_POST['Search_text']."'";
      }
    }
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
   <div id="main_content_container" class="row mt-4">
   <?php
   require_once("includes/left_menu_container.php");
   ?>
   <div id="main_content" class="col-md-8 rounded border border-dark mb-3">
   <div class="table-responsive main_view_table_vertical mt-3 mb-3">
   <table class="table table-hover">
  <thead>
    <tr>
      <th  scope="col">Фото</th>
            <th scope="col">Фамилия</th>
      <th scope="col">Имя</th>
      <th scope="col">Отчество</th>
      <th scope="col">Пол</th>
      <th scope="col">Дата рождения</th>
      <th scope="col">Дата регистр.</th>
      <th scope="col">Страна</th>
      <th scope="col">Город</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($link, "SELECT photo, F_name, L_name, Patronymic, Gender, Date, date_register, cities.value, countries.value, citizen.id  FROM `citizen` LEFT JOIN cities ON cities.id=citizen.city_id LEFT JOIN countries ON countries.id=cities.country_id ".$W);

      while(($row=mysqli_fetch_array($result))!=null){
        if ($row[0]=="")
          $photo = "images/default.png";
        else
          $photo=$row[0];
      echo '<tr onclick=location.href="user.php?id='.$row[9].'" class="hover_cursor_class"> <td>  <img src="'.$photo.'" class="rounded border border-dark img-thumbnail" width="75" height="75" alt="err"></td>';
      echo "<td>".$row[1]."</td>";
      echo "<td>".$row[2]."</td>";  
      echo "<td>".$row[3]." </td>";
      echo "<td>"; if ($row[4]=1) echo "М"; else echo "Ж"; 
      echo " </td>";
      echo "<td>".$row[5]." </td>"; 
      echo "<td>".$row[6]."</td>";
      echo "<td>".$row[8]."</td>";
      echo "<td>".$row[7]."</td>";
      echo "</tr>";

    }
    ?>

    
  </tbody>
</table>
</div>
   </div>
    
</body>
</html>
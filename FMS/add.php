﻿<?php
include_once('includes/connect.php');

  if ($_SESSION['loged_user']==0)//проверка на авторизацию
     header('Location: ' . 'login.php');
if(isset($_POST['Add_citizen']))
{
 $result = mysqli_query($link, "SELECT id FROM `citizen` ORDER BY id");
  while(($row=mysqli_fetch_array($result))!=null)
  {
  $last=$row[0]+1;
  }

  $city_id = $_POST['cities'];//считывание полей
  $serial=$_POST['serial'];
  $number=$_POST['number'];
  $F_name=$_POST['F_name'];
  $L_name=$_POST['L_name'];
  $Patronymic=$_POST['Patronymic'];
  $Gender=$_POST['sex_client'];
  $Date=$_POST['Date'];
  $Nationality=$_POST['Nationality'];
  $adress=$_POST['adress'];
  $Identification_id=$_POST['Identification_id'];
  $date_register=date("Y-m-d"); 

  mysqli_query($link,"INSERT INTO `citizen`(id, `serial`, `number`, `F_name`, `L_name`, `Patronymic`, `Gender`, `Date`, `Nationality`, `adress`, `Identification_id`,  `date_register`, `city_id`) VALUES  (".$last.",'".$serial."', ".$number.", '".$F_name."', '".$L_name."', '".$Patronymic."', ".$Gender.", '".$Date."', '".$Nationality."', '".$adress."', ".$Identification_id.", '".$date_register."',".$city_id.")");

if ($_FILES['add_photo']['size']>0)//если выбрано изображение
{
  mysqli_query($link,"UPDATE `citizen` SET photo ='images/".$last.".png"."' WHERE id=".$last);
  copy($_FILES['add_photo']['tmp_name'],"images/".$last.".png");

}

}
?>
<script>
function MkHouseValues(index, name){
  var aCurrHouseValues=document.forms[name].elements["countries"].value.split(",");
    var nCurrHouseValuesCnt = aCurrHouseValues.length;
    var oHouseList = document.forms[name].elements["cities"];
    var oHouseListOptionsCnt = oHouseList.options.length;
    oHouseList.length = 0;
    for (i = 0; i < nCurrHouseValuesCnt-1; i+=2){
        if (document.createElement){
            var newHouseListOption = document.createElement("OPTION");
            newHouseListOption.text = aCurrHouseValues[i+1];
            newHouseListOption.value = aCurrHouseValues[i];
            (oHouseList.options.add) ? oHouseList.options.add(newHouseListOption) : oHouseList.add(newHouseListOption, null);
        }else{
            oHouseList.options[i] = new Option(aCurrHouseValues[i+1], aCurrHouseValues[i], false, false);
        }
    }
}
</script>
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
   <div id="add_content_container" class="row mt-4" style="">
   <?php
   require_once("includes/left_menu_container.php");
   ?>
   <div id="add_content" class="col-md-8 rounded border border-dark mb-3">
 <form method ="POST" enctype="multipart/form-data" name="add">
 <div class="form-group d-flex mt-3" >
 <label for="add_surname" class="col-md-3 mt-2">Фамилия:</label>
<input type="text" name="F_name" required minlength="3" class="form-control col-md-9 border-dark" id="add_surname">
 </div>
 <div class="form-group d-flex mt-3" >
 <label for="add_name" class="col-md-3 mt-2">Имя:</label>
<input type="text" name="L_name" required minlength="3"  class="form-control col-md-9 border-dark" id="add_name">
 </div>
 <div class="form-group d-flex mt-3" >
 <label for="add_middle_name"  class="col-md-3 mt-2">Отчество:</label>
<input type="text" name="Patronymic" required minlength="3" class="form-control col-md-9 border-dark" id="add_middle_name">
 </div>
 <div class="form-group d-flex mt-3" >
 <label for="add_middle_name"  class="col-md-3 mt-2">Дата рождения:</label>
<input type="date" name="Date" required class="form-control col-md-5 border-dark" id="add_middle_name">
 </div>
 <div class="input-group d-flex mt-3" >
<p class="col-3 mb-3">Пол:</p>
<div class="input-group col">
<div class="form-check form-check-inline mb-3">
  <input class="form-check-input" name="sex_client" type="radio" id="add_sex_m" checked="true" value="1">
  <label class="form-check-label" for="add_sex_m">Мужской</label>
</div>
<div class="form-check form-check-inline mb-3">
  <input class="form-check-input" name="sex_client" type="radio" id="add_sex_w" value="0">
  <label class="form-check-label" for="add_sex_w">Женский</label>
</div>
</div>  
 </div>
 <div class="form-group d-flex mt-3">
 <label for="add_nationality" class="col-md-3 mt-2">Гражданство:</label>
<input type="text" minlength="3" required name="Nationality" class="form-control col-md-9 border-dark" id="add_nationality">
 </div>
  <div class="form-group d-flex mt-3">
 <label for="add_country" class="col-md-3 mt-2">Страна проживания:</label>
<div class="input-group mb-3">

<select name="countries" onchange="MkHouseValues(this.selectedIndex,'add')" id="country_id"  class="form-control  rounded border-dark col-md-6 offset-md-1">
   <?php $result = mysqli_query($link, "SELECT * FROM `countries`");//вывод стран
   $a=0;
   while(($row=mysqli_fetch_array($result))!=null){
    if ($a==0)
      $a=$row[0];
    $result1 = mysqli_query($link, "SELECT * FROM `cities` WHERE country_id=".$row[0]);
     while(($row1=mysqli_fetch_array($result1))!=null)
      $w.=$row1[0].",".$row1[1].",";
    echo "<option value=".$w.">".$row[1]."</option>";
    $w="";
   }
   ?>
</select>
</div> </div>
 <div class="form-group d-flex mt-3">
 <label for="add_city"  class="col-md-3 mt-2">Город проживания:</label>
<div class="input-group mb-3">

<select name="cities" class="form-control rounded border-dark col-md-6 offset-md-1">
   <?php
    $result = mysqli_query($link, "SELECT * FROM `cities` WHERE country_id=".$a);//вывод городов
   while(($row=mysqli_fetch_array($result))!=null)
    echo "<option value=".$row[0].">".$row[1]."</option>";
   ?>
</select>
</div>
 </div>
 <div class="form-group d-flex mt-3">
 <label for="add_adress" class="col-md-3 mt-2">Адрес проживания:</label>
<input type="text" minlength="3" required name="adress" class="form-control col-md-9 border-dark" id="add_adress">
 </div>
 <div class="form-group d-flex mt-3">
 <label for="add_document" class="col-md-4 mt-3">Удостоверение личности:</label>
 <select name="Identification_id" class="form-control rounded border-dark col-md-8 mt-2">
   <?php
    $result = mysqli_query($link, "SELECT * FROM `identification`");
   while(($row=mysqli_fetch_array($result))!=null)
    echo "<option value=".$row[0].">".$row[1]."</option>";
   ?>
</select>
 </div>
 <div class="form-group d-flex mt-3">
 <label for="add_nationality" class="col-md-2 mt-2">Серия:</label>
<input type="text" name="serial" required minlength="2" maxlength="4" class="form-control col-md-2 border-dark" id="add_nationality">
<label for="add_nationality" class="col-md-2 mt-2 offset-md-1">Номер:</label>
<input type="number" name="number" required min=100000 max=999999 class="form-control col-md-3 border-dark" id="add_nationality">
 </div>
 <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" name="add_photo" accept="image/*" class="custom-file-input" id="add_photo">
    <label class="custom-file-label border-dark" for="add_photo">Фотография...</label>
  </div>
</div>
<button type="submit" name="Add_citizen" class="btn btn-outline-dark col-md-6 offset-md-3 mb-3">Добавить</button>
</form>
   </div>
   </div>
   <script src="js/bootstrap.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>
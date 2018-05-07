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
   <div id="edit_content_container" class="row mt-4" style="">
   <?php
   require_once("includes/left_menu_container.php");
   ?>
   <div id="edit_content" class="col-md-8 rounded border border-dark mb-3">
 <form>
 <div class="form-group d-flex mt-3" >
 <label for="edit_surname" class="col-md-3 mt-2">Фамилия:</label>
<input type="text" class="form-control col-md-9 border-dark" id="edit_surname">
 </div>
 <div class="form-group d-flex mt-3" >
 <label for="edit_name" class="col-md-3 mt-2">Имя:</label>
<input type="text" class="form-control col-md-9 border-dark" id="edit_name">
 </div>
 <div class="form-group d-flex mt-3" >
 <label for="edit_middle_name" class="col-md-3 mt-2">Отчество:</label>
<input type="text" class="form-control col-md-9 border-dark" id="edit_middle_name">
 </div>
 <div class="form-group d-flex mt-3" >
 <label for="edit_middle_name" class="col-md-3 mt-2">Дата рождения:</label>
<input type="date" class="form-control col-md-5 border-dark" id="edit_middle_name">
 </div>
 <div class="input-group d-flex mt-3" >
<p class="col-3 mb-3">Пол:</p>
<div class="input-group col">
<div class="form-check form-check-inline mb-3">
  <input class="form-check-input" type="checkbox" id="edit_sex_m" value="option1">
  <label class="form-check-label" for="edit_sex_m">Мужской</label>
</div>
<div class="form-check form-check-inline mb-3">
  <input class="form-check-input" type="checkbox" id="edit_sex_w" value="option2">
  <label class="form-check-label" for="edit_sex_w">Женский</label>
</div>
</div>  
 </div>
 <div class="form-group d-flex mt-3">
 <label for="edit_nationality" class="col-md-3 mt-2">Гражданство:</label>
<input type="text" class="form-control col-md-9 border-dark" id="edit_nationality">
 </div>
 <div class="form-group d-flex mt-3">
 <label for="edit_adress" class="col-md-3 mt-2">Адрес проживания:</label>
<input type="text" class="form-control col-md-9 border-dark" id="edit_adress">
 </div>
 <div class="form-group d-flex mt-3">
 <label for="edit_document" class="col-md-4 mt-3">Удостоверение личности:</label>
 <select class="form-control rounded border-dark col-md-8 mt-2">
 <option>Паспорт</option>
 <option>Свидетельство о рождении</option>
 <option>еще чет1</option>
 <option>еще чет2</option>
 <option>еще чет3</option>
</select>
 </div>
 <div class="form-group d-flex mt-3">
 <label for="edit_nationality" class="col-md-2 mt-2">Серия:</label>
<input type="text" class="form-control col-md-2 border-dark" id="edit_nationality">
<label for="edit_nationality" class="col-md-2 mt-2 offset-md-1">Номер:</label>
<input type="number" class="form-control col-md-3 border-dark" id="edit_nationality">
 </div>
 <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="edit_photo">
    <label class="custom-file-label border-dark" for="edit_photo">Фотогрфия...</label>
  </div>
</div>
<button type="submit" class="btn btn-outline-dark col-md-6 offset-md-3 mb-3">Сохранить</button>
</form>
   </div>
   </div>
   <script src="js/bootstrap.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
</body>
</html>
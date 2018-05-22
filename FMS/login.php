<?php
include_once('includes/connect.php');
  if ($_GET['t']==0 && $_SESSION['log_id']!=0)//проверка на авторизацию
    {
      $_SESSION['loged_user']=0;
      //echo "UPDATE `log` SET date_f ='".date("Y-m-d H:i:s")."' WHERE id = ".$_SESSION['log_id'];
      mysqli_query($link, "UPDATE `log` SET date_f ='".date("Y-m-d H:i:s")."' WHERE id = ".$_SESSION['log_id']);
       $_SESSION['log_id']=0;
    }
if(isset($_POST['logon']))//нажатие на кнопку "Войти"
  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = mysqli_query($link, "SELECT * FROM `users` where `login` = '$login'");
    $user_data = mysqli_fetch_array($result);
    $salt = $user_data[3];
    $hash .= md5($salt.$password);
    $p=$user_data[2];
    if ($hash==$p)//Если пароль верен
    {
      $_SESSION['loged_user']=1;
      $_SESSION['id']=$user_data[0];
      $_SESSION['login']=$user_data[1];
    $result1 = mysqli_query($link, "SELECT id FROM `log` ORDER BY id");
    $last=0;
   while(($row=mysqli_fetch_array($result1))!=null)
    {
    $last=$row[0]+1;
    }//добавление записи в лог
      mysqli_query($link, "INSERT INTO `log` (`id`, `user_id`, `date_s`) values (".$last.", ".$user_data[0].",'".date("Y-m-d H:i:s")."')");
      $_SESSION['log_id']=$last;

      header('Location: ' . '/main.php');
    }
     else $error = "<h3>Неправильный логин или пароль</h3>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<?php echo $error; ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система паспортного учета ФМС</title>
    <link rel="shortcut icon" href="images/icon_ufms.png" type="image/png">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="container">
  <div id="login_form_container" class="container col-md-11">
    <div id="login_form_header" class="d-flex">
    <img id="login_form_logo" src="images/ufms.png" alt="Error" class="order-2 p-2">
    <p id="login_form_logo_text" class="align-self-center order-3 p-2 text-center">ПАСПОРТНЫЙ УЧЕТ ФЕДЕРАЛЬНАЯ МИГРАЦИОННАЯ СЛУЖБА</p>
    </div>
    <div id="login_form_fields" class="col-6 mx-auto">
    <form method=POST>
  <div class="form-group">
    <input type="text" name="login" class="form-control border-dark" id="login_input" placeholder="Логин...">
  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control border-dark" id="password_input" placeholder="Пароль...">
  </div>
  <button type="submit" name="logon" class="btn btn-outline-dark col-md-6 offset-md-3">Войти</button>
</form>
    </div>
  </div>
  </body>
</html>
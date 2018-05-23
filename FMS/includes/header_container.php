<header id="header_container" class="d-flex border-bottom border-dark">
<div class="col-md-9 d-flex">
   <a href="main.php"><img id="header_logo" src="images/header_ufms.png" alt="Error" class="order-1 p-2"></a>
    <p id="header_text" class="align-self-center p-2 text-center">ПАСПОРТНЫЙ УЧЕТ ФЕДЕРАЛЬНАЯ МИГРАЦИОННАЯ СЛУЖБА</p>
    </div>
    <div class="col-md-3 d-flex">
    <p id="header_username" class="align-self-center order-3 p-2 text-right col-10">Здравствуйте, <?php echo $_SESSION['login'] ?></p>
    <a id="header_logout" href="login.php" class="align-self-center order-4 text-center col-2"><img src="images/header_logout.png" alt="err" class="mb-3"></a>
    </div>
    </header>

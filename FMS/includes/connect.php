<?php //Подключение к БД
$link = mysqli_connect( 
            'localhost',  /* Хост, к которому мы подключаемся */ 
            'root',       /* Имя пользователя */ 
            '',   /* Используемый пароль */ 
            'PassportOffice');   
              /* База данных для запросов по умолчанию */ 

if (!$link) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 
session_start();
header('Content-type: text/html; charset=utf-8');
?>
<?php
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$login=md5($login."fdgdfgdfvxcv12312434554");
$pass=md5($pass."fdgdfgdfvxcv12312434554");


$mysql=new mysqli('localhost','root','','register');
//вибірка користувача з бази
$result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass' ");

//Переведення об’єкту в масив
$user=$result->fetch_assoc();
//Якщо такого користувача не знайдено виводим повідомлення
if(count($user)==0)
{
    echo "Такого користувача не знайдено";
    exit();
}

//Задає кукі яке буде передано клієнту та час життя куки
setcookie('user',$user['email'],time()+3600*24,"/");
$mysql->close();
//Повертаємось на головну сторінку
header('Location:/ajax/');

?>
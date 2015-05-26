<?php 

$db = mysql_connect("localhost","root","");
mysql_select_db ("wt", $db);


if(isset($_POST['add_zakaz']))
{
if(isset($_POST['server']) && !empty($_POST['server']))
{
	 $server = $_POST['server'];
	 $server = trim($server);
	 $server = strip_tags($server);
	 $server = stripslashes($server);
}

if(isset($_POST['get_money']) && !empty($_POST['get_money']) && isset($_POST['buy_money']) && !empty($_POST['buy_money']))
{
	
	if (preg_match("/[0-9]+/",$_POST['get_money']))
	{
		$get_money = $_POST['get_money'];
	}
	
	if (preg_match("/[0-9]+/",$_POST['buy_money']))
	{
		$buy_money = $_POST['buy_money'];
	}
}

if(isset($_POST['sposob']) && !empty($_POST['sposob']))
{
	 $sposob = $_POST['sposob'];
}

if(isset($_POST['name_char']) && !empty($_POST['name_char']))
{
	 
	 if (preg_match("/^[A-Za-z0-9_]{3,18}$/",$_POST['name_char']))
	{
		 $name_char = $_POST['name_char'];
	}
}

if(isset($_POST['comment']) && !empty($_POST['comment']))
{
	 $comment = $_POST['comment'];
	 $comment = trim($comment);
	 $comment = strip_tags($comment);
	 $comment = stripslashes($comment);
	
}

/*if($sposob == "Почта")
{
	$sposob = 0;
}elseif($sposob == "Встреча в игре")
{
	$sposob = 1;
}
*/
mysql_query("INSERT INTO zakaz SET Credits='$get_money',Money='$buy_money',sposob='$sposob',Nick='$name_char',coment='$comment'",$db);
}
?>

<!DOCTYPE HTML>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Apik" />

	<title>Информация о заказе</title>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
        
</head>
<body>

<header>
</header>

<div class="main">

<nav>
        <a href="/">Главная</a>  <a href="clas.php">Классы</a> <a href="zakaz.php">Покупка Валюты</a>  <a href="#">Регистрация</a>
</nav>

<div class="content">

<div class="warning"> Вы сделали заказ: </div>
  
  <br />
  
   <?php
	
    $server = $_POST['server'];
    $get_money = $_POST['get_money'];
    $buy_money = $_POST['buy_money'];
    
    $sposob = $_POST['sposob'];
    $name_char = $_POST['name_char'];
    $comment = $_POST['comment'];
    
    ?>
    
   <p>Название сервера: <?php echo $server; ?></p>
   <p>Вы заказали:  <?php echo $get_money; ?> млн кредитов</p>
   <p>Вы заплатите:  <?php echo $buy_money; ?> руб.</p>
   <p>Способ получения:  <?php echo $sposob; ?> </p>
   <p>Ник персонажа:  <?php echo $name_char; ?> </p>
   <p>Ваш комментарий: <?php echo $comment; ?> </p>
   
</div>

</div>

<footer>

</footer>


</body>
</html>
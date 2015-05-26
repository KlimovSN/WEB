<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Apik" />

	<title>Оформление заказа</title>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
    
    <script src="js/jquery-2.1.1.min.js"></script>
    
    <script>
    $(document).ready(function() { 
                   
          $('#buy_money').change(function() {         
                $('#get_money').val( ($('#buy_money').val()/139).toFixed(2));
            });
            
            $('#get_money').change(function() {         
                $('#buy_money').val( ($('#get_money').val()*139));
            });
    });  // конец ready
    
    </script>
        
</head>
<body>

<header>
</header>

<div class="main">

<nav>
        <a href="index.php">Главная</a>  <a href="clas.php">Классы</a> <a href="zakaz.php">Покупка Валюты</a>  <a href="#">Регистрация</a>
</nav>

<div class="content">

<div class="warning"> Покупка кредитов: </div>
  
  <br /><br />
   
  <form method="post" action="info.php">
  
  <label>Выберете сервер:</label><br />
  <select name="server" class="textbox">
      <option value="T3-M4">T3-M4</option>
      <option value="Darth Nihilus">Darth Nihilus</option>
      <option value="Tomb of Freedon Nadd">Tomb of Freedon Nadd</option>
      <option value="Jar'Kai Sword">Jar'Kai Sword</option>
	  <option value="The Progenitor">Jar'Kai Sword</option>
	  <option value="Vanjervalis Chain">Vanjervalis Chain</option>
	  <option value="Battle Meditation">Battle Meditation</option>
	  <option value="Mantle of the Force">Mantle of the Force</option>
	  <option value="The Red Eclipse">The Red Eclipse</option>
  </select>
  
  <br />
  <p> 1 млн кредитов = 139 руб</p>
  <label> Количество кредитов: </label>
  <input id="get_money" name="get_money" type="text"  value="0" pattern="^[0-9]+$" class="textbox" title="Только цифры" required /> млн кредитов
  <br />
  <label> Количество денег: </label>
  <input id="buy_money" name="buy_money" type="text"  value="0" pattern="^[0-9]+$" class="textbox" title="Только цифры"  required /> руб.
  <br /><br />
  <br />
  <label>Способ передачи:</label><br />
  <p><label><input name="sposob" type="radio" value="Почта" checked> Почта </label></p>
  <p><label><input name="sposob" type="radio" value="Встреча в игре"> Встреча в игре</label></p>
	
  <br />
  
  <label> Ник персонажа: </label><br />
  <input name="name_char" type="text"  pattern="[(A-Za-zА-Яа-я)|(A-Za-zА-Яа-я0-9]{3,15}" title="Ник может содержать только латинские буквы и цифры. Длинна от 3-15 символов." class="textbox" required />
  
  <br />
  
  <label> Комментарий: </label>
  <textarea name="comment" class="message"></textarea>
  
  <br />
   
  <input name="add_zakaz" class="button" type="submit" value="Отправить" />

  </form>
  
</div>

</div>

<footer>

</footer>


</body>
</html>
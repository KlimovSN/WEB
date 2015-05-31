<div class="warning"> Вы сделали заказ: </div>
  
  <br />
    
   <p>Ваш идентификатор заказа: <span id="id"><?php echo $Obj->GetId(); ?></span></p>
   <p>Название сервера: <?php echo $Obj->Get_server(); ?></p>
   <p>Вы заказали:  <?php echo $Obj->Get_get_money(); ?> млн кредитов</p>
   <p>Вы заплатите:  <?php echo $Obj->Get_buy_money(); ?> руб.</p>
   <p>Способ получения:  <?php echo $Obj->Get_sposob(); ?> </p>
   <p>Ник персонажа:  <?php echo $Obj->Get_name_char(); ?> </p>
   <p>Ваш комментарий: <?php echo $Obj->Get_comment(); ?> </p>
   <p>Ваш статус заказа: <span id="status"><?php echo $Obj->Get_status(); ?></span> </p>
   
   <button onclick="checkStatus(<?php echo $Obj->GetId(); ?>)"> Проверить статус</button>
   
   <script>
   
   var request = new XMLHttpRequest();
   
   function checkStatus(id) { 
	var xmlString = "<zakaz>" +
        "  <id>" + escape(id) + "</id>" +
     
        "</zakaz>";
		
	// Построим URL для соединения
      var url = "http://localhost/my_mvc/www/controller_info.php";
    
      // Откроем соединение с сервером
      request.open("POST", url, true);
    
      // Сообщим серверу, что вы посылаете данные в формате XML
      request.setRequestHeader("Content-Type", "text/xml");
    
      // Установим функцию запуска сервера, когда это выполнено
      request.onreadystatechange = updatePage;
    
      // Отправим заказ
      request.send(xmlString);
   }
   
    function updatePage() {
      if (request.readyState == 4) {
        if (request.status == 200) {
         
            var xmlDoc = request.responseText;
            
            var status = xmlDoc.match(/<status>(.*?)<\/status>/);
            
            document.getElementById('status').innerHTML=status[1];
              
            //alert(xmlDoc);
          }
        }
      }
   </script>
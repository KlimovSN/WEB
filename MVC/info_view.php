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
   
  
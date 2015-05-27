<?php

require_once 'database.php';

        //if(isset($_POST['add_zakaz']))
        //{   
            $error = "";
            
            $array_zakaz = array(
                'id'=>0,
                'get_money'=>$_POST['get_money'],
                'buy_money'=>$_POST['buy_money'],
                'sposob'=>$_POST['sposob'],
                'name_char'=>$_POST['name_char'],
				'comment'=>$_POST['comment'],
				'server'=>$_POST['server'],
				'status'=>0
                
            );
            
            $zakaz = new zakaz($array_zakaz);
            
            if(!$zakaz->Validation_name_char())
            {
              $error.="Ник не прошел валидацию.";
            }
            
            if(!$zakaz->Validation_get_money())
            {
              $error.="Количество получаемых денег не прошло валидацию.";  
            }
            
            if(!$zakaz->Validation_buy_money())
            {
                $error.="Количество покупаемых денег не прошло валидацию.";
            }
			
			if(!$zakaz->Validation_comment())
            {
                $error.="Комментарий не прошел валидацию.";
            }
            
            if($zakaz->Validation_name_char() && $zakaz->Validation_get_money() && $zakaz->Validation_buy_money() && $zakaz->Validation_comment())
            {
                $zakaz->AddZakaz();
				
				echo '<META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://localhost/my_mvc/www/controller_info.php?id='.$zakaz->GetLastId().'">';
            }
           
        //} 
        
        $content_view = "zakaz_view";
        require_once("template_view.php");
        break;


?>

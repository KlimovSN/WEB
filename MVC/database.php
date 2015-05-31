<?php

require_once 'zakaz.php';

class database {
    
    private $host;
    private $user;
    private $pass;
    
    public function __construct() {
      
       $this->host = "localhost";
       $this->user = "root";
       $this->pass = "";
    }
    
    public function InsertZakaz ($zakaz)
    {
        $db = mysql_connect($this->host,$this->user,$this->pass)  or die("Невозможно соединиться с базой");
        mysql_select_db("wt",$db)  or die("Невозможно выбрать базу");
        $result = mysql_query("INSERT INTO zakaz SET get_money='".$zakaz->Get_get_money()."',buy_money='".$zakaz->Get_buy_money()."',sposob='".$zakaz->Get_sposob()."',name_char='".$zakaz->Get_name_char()."',comment='".$zakaz->Get_comment()."',server='".$zakaz->Get_server()."'",$db); 
		
    }
    
    public function SelectZakaz ($id)
    {
        $db = mysql_connect($this->host,$this->user,$this->pass)  or die("Невозможно соединиться с базой");
        mysql_select_db("wt",$db)  or die("Невозможно выбрать базу");
        
        $result = mysql_query("SELECT * FROM zakaz WHERE id=$id",$db);
        $row = mysql_fetch_array($result);
		
		if( $row['status']==0)
		{
			$row['status'] = "В обработке";
		}elseif($row['status']==1)
		{
			$row['status'] = "Выполнен";
		}elseif($row['status']==2)
		{
			$row['status'] = "Не выполнен";
		}
        
        $zakaz = new zakaz($row);
        
        return $zakaz;
    }
	
	public function GetLastId ()
    {
        $db = mysql_connect($this->host,$this->user,$this->pass)  or die("Невозможно соединиться с базой");
        mysql_select_db("wt",$db)  or die("Невозможно выбрать базу");
		
        $result = mysql_query("SELECT * FROM zakaz ORDER BY id DESC LIMIT 1",$db);
        $row = mysql_fetch_array($result);
        
        return $row['id'];
    }
    
	
	public function CheckStatus ($rawPostData)
    {
        $db = mysql_connect($this->host,$this->user,$this->pass)  or die("Невозможно соединиться с базой");
        mysql_select_db("wt",$db)  or die("Невозможно выбрать базу");
        
        $xml = new SimpleXMLElement($rawPostData);
        foreach ($xml as $key => $value) {
        	$$key = $value;
            
            if($key=="id")
            {
                $id = $value;
            }
            
        }
        
        $queryResult = mysql_query("SELECT * FROM zakaz WHERE id=$id",$db);
        $row = mysql_fetch_array($queryResult);
        
        $status = $row['status'];
		
		if($status==0)
		{
			$status = "В обработке";
		}elseif($status==1)
		{
			$status = "Выполнен";
		}elseif($status==2)
		{
			$status = "Не выполнен";
		}
        
        
        header('Content-Type: application/xml');
        $xml = "<?xml version=\"1.0\" ?>";
        
        $xml.= "<zakaz>";
        
        $xml.= "<status>" . $status . "</status>";
        
        
        $xml.= "</zakaz>";
        
        return $xml;
    }
    
}


?>
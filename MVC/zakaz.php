<?php

require_once 'database.php';

class zakaz {
    
    private $id;
    private $get_money;
    private $buy_money;
    private $sposob;
    private $name_char;
    private $comment;
	private $server;
	private $status;
    
    public function __construct($zakaz) {
        
       $this->id = $zakaz['id'];
       $this->get_money = $zakaz['get_money'];
       $this->buy_money = $zakaz['buy_money'];
       $this->sposob = $zakaz['sposob'];
       $this->name_char = $zakaz['name_char'];
       $this->comment = $zakaz['comment'];
	   $this->server = $zakaz['server'];
	   $this->status = $zakaz['status'];
	   
    }
    
    public function AddZakaz() // Добавление заказа
    {
        $db = new database();
        
        if($this->Validation_name_char() && $this->Validation_get_money() && $this->Validation_buy_money() && $this->Validation_comment())
        {
            $db->InsertZakaz($this);            
        }
            
    }
    
    public function Validation_name_char()
    {
        if(!preg_match("/^[A-Za-z0-9_]{3,20}$/i", $this->name_char)) { 
            return false;
        }else{
            return true;
        } 
        
    }
	
	public function Validation_get_money()
	{
		if(!preg_match("/^[0-9]{1,5}$/i", $this->get_money)) { 
            return false;
        }else{
            return true;
        } 
	}
	
	public function Validation_buy_money()
	{
		if(!preg_match("/^[0-9]{1,5}$/i", $this->buy_money)) { 
            return false;
        }else{
            return true;
        } 
	}
    
    public function Validation_comment()
    {
        $comment=trim($this->comment);    
    	$comment=stripslashes($comment);
        $original_len = strlen($comment);
        $comment=strip_tags($comment);
        $current_len = strlen($comment);
        
        if(strlen($comment)<7 && $original_len!=$current_len)
        {
            return false;
        }else
        {
           return true;
        }
    }
    
    
    public function GetId ()
    {
        return $this->id;
    }
	
	public function GetLastId ()
    {
		$db = new database();
        return $db->GetLastId();
    }
    
    public function Get_get_money ()
    {
        return $this->get_money;
    }
    
    public function Get_buy_money()
    {
        return $this->buy_money;
    }
    
    public function Get_sposob()
    {
        return $this->sposob;
    }
    
    public function Get_name_char()
    {
        return $this->name_char;
    }
    
    public function Get_comment()
    {
        return $this->comment;
    }
	
	public function Get_server()
    {
        return $this->server;
    }
	
    public function Get_status()
    {
        return $this->status;
    }
	
}

?>
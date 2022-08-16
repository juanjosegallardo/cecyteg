<?php 
class Session
{
	function __construct()
	{
		$this->iniciar();
	}
	
    function __set($dato,$valor)
	{
		//session_register($dato);
		$_SESSION[$dato]=$valor;
	}
	
	function __get($dato)
	{
		if(isset($_SESSION[$dato]))
		{
			return $_SESSION[$dato];
		}
		else
		{
			return "";
		}
		
	}
	
	public function iniciar()
	{
        	ob_get_clean();	
		if(!isset($_SESSION))
		{
			ini_set("session.cookie_lifetime","0");
			ini_set("session.gc_maxlifetime","0");
			session_start();
			
		}
	}
	
	public function detener()
	{
		session_destroy();		
	}
}
?>

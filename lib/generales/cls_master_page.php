<?php 
class MasterPage
{
	public static function iniciarSeccion()
	{
		ob_start();
	}
	
	public static function finalizarSeccion(&$variable)
	{
		$variable=ob_get_contents();
		ob_clean();
	}
}

?>
<?php
class JavaScript
{
	public static function redireccionar($pagina)
	{
?>
	<script type="text/javascript">
		location.href="<?php echo $pagina; ?>";
	</script>
<?php
	}
	public static function alerta($mensaje)
	{
?>
	<script type="text/javascript">
		alert("<?php echo $mensaje; ?>");
	</script>		
<?php
	}
}
?>

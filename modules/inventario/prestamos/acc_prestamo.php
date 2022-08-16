<?php
include_once("../../../config.php");  
include("../../../lib/generales/cls_session.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");
include("../../../lib/generales/cls_archivo.php");

include("../../../classes/cls_prestamo.php");
include("../../../classes/cls_prestamo_profesor.php");
include("../../../classes/cls_prestamo_alumno.php");
include("../../../classes/cls_prestamo_usuario.php");
include("../../../classes/cls_profesor.php");
include("../../../classes/cls_alumno.php");
include("../../../classes/cls_usuario.php");
include("../../../classes/cls_inventario.php");
include("../../../classes/cls_mensaje.php");
include("../../../lib/ui/cls_grid.php");
include("dic_prestamo.php");

$obj_session=new Session();
if(in_array( "SCR_PRESTAMOS" ,$obj_session->permisos))
{
    switch($_POST['_accion'])
    {

	case "cancelar":
		$obj_prestamo = new Prestamo();
		$obj_prestamo->id_prestamo = $_POST["id_prestamo"];
		$obj_prestamo->cancelar();
		
		if( $obj_prestamo->_conexion->ejecutarTransaccion())            
		{
		    $obj_session->mensaje="El prestamo se guardo correctamente"; 
							             
		}
		else            
		{		

		    	$obj_session->mensaje="Ocurrio un error, intente mas tarde"; 
		}   

	break;


	case "prestar":
		$obj_prestamo = new Prestamo();
		$obj_prestamo->id_prestamo = $_POST["id_prestamo"];	
		$obj_prestamo->cargarPorId();
		$obj_prestamo->_conexion->iniciarTransaccion();
		$obj_prestamo->devolver_otros();
		$obj_prestamo->prestar();
		
		if( $obj_prestamo->_conexion->ejecutarTransaccion())            
		{
			$obj_session->mensaje="El prestamo se guardo correctamente"; 	             
		}
		else            
		{		
		    	$obj_session->mensaje="Ocurrio un error, intente mas tarde"; 
		}   

	break;


	case "devolver":
		$obj_prestamo = new Prestamo();
		$obj_prestamo->id_prestamo = $_POST["id_prestamo"];	
		$obj_prestamo->devolver();
		
		if( $obj_prestamo->_conexion->ejecutarTransaccion())            
		{
		    $obj_session->mensaje="El prestamo se guardo correctamente"; 
							             
		}
		else            
		{		

		    	$obj_session->mensaje="Ocurrio un error, intente mas tarde"; 
		}   

	break;
    	case "guardar":
    		
	$obj_prestamo = new Prestamo();
	$obj_formulario = new Formulario();
	$obj_formulario->pantalla=$pantalla_prestamo;
	$obj_formulario->validar($obj_prestamo);

	$obj_inventario = new Inventario();
	$obj_inventario->numero_inventario = $_POST["txt_no_inventario"];
	$obj_inventario->id_inventario=0;
	$obj_inventario->cargarPorNumeroInventario();        
	$obj_prestamo->tbl_inventario_id_inventario = $obj_inventario->id_inventario;

	$obj_prestamo->fecha=$_POST["txt_fecha_inicio"]." " .  $_POST["sel_hora"];

	$obj_prestamo->cargarPrestamoSimilar();
	$obj_prestamo->tbl_usuario_id_usuario=$obj_session->id_usuario;
	$obj_prestamo->_conexion->iniciarTransaccion(); 
	$prestado = false;
	if(count($obj_prestamo->_datos))
	{	$prestado =true;
		$obj_prestamo->_conexion->estado = false;
	}

	$obj_prestamo->estatus = 1;                                                 
	$obj_prestamo->guardar();

	switch($_POST["sel_tipo"] )
	{
	case "1":
		$obj_profesor = new Profesor($obj_prestamo->_conexion);
		$obj_profesor->codigo = $_POST["txt_clave"];
		$obj_profesor->id_profesor=0;
		$obj_profesor->cargarPorCodigo();   					
		$obj_prestamo_profesor=  new PrestamoProfesor($obj_prestamo->_conexion);
		$obj_prestamo_profesor->tbl_profesor_id_profesor = $obj_profesor->id_profesor;
		$obj_prestamo_profesor->tbl_prestamo_id_prestamo = $obj_prestamo->id_prestamo;
		$obj_prestamo_profesor->guardar();
	break;
	case "2":					
		$obj_alumno = new Alumno($obj_inventario->_conexion);
		$obj_alumno->no_control = $_POST["txt_clave"];
		$obj_alumno->id_alumno=0;
		$obj_alumno->cargarPorNoControl();   
		$obj_prestamo_alumno=  new PrestamoAlumno($obj_prestamo->_conexion);
		$obj_prestamo_alumno->tbl_alumno_id_alumno = $obj_alumno->id_alumno;
		$obj_prestamo_alumno->tbl_prestamo_id_prestamo = $obj_prestamo->id_prestamo;
		$obj_prestamo_alumno->guardar();
	break;
	case "3":
		$obj_usuario = new Usuario($obj_inventario->_conexion);
		$obj_usuario->nombre_usuario = $_POST["txt_clave"];
		$obj_usuario->id_usuario =0 ;
		$obj_usuario->cargarPorUsuario();  
		$obj_prestamo_usuario= new PrestamoUsuario($obj_prestamo->_conexion);
		$obj_prestamo_usuario->tbl_usuario_id_usuario =  $obj_usuario->id_usuario;
		$obj_prestamo_usuario->tbl_prestamo_id_prestamo = $obj_prestamo->id_prestamo;
		$obj_prestamo_usuario->guardar();
	break;
	}
	 
			
            if( $obj_formulario->validado)
            {
            

                if( $obj_prestamo->_conexion->ejecutarTransaccion())            
                {
                    $obj_session->mensaje="Tu haz guardado el prestamo"; 
					                             
                }
                else            
                {
				
					if($obj_inventario->id_inventario==0)
					{
						$obj_session->mensaje="El numero de inventario no existe, el prestamo no pudo guardarse"; 
					}
					else if($prestado)
					{
						$obj_session->mensaje="Ya se encuentra en prestamo"; 
					}
					else
					{
                    	$obj_session->mensaje="Ocurrio un error, el prestamo no pudo guardarse, revise el codigo del solicitante"; 
					}
  
                }        
                            
            }
            else
            {
                $obj_session->mensaje=$obj_formulario->mensaje;
            }                        																					
    	break;
			
    }
}
else
{
    $obj_session->mensaje = "No cuenta con los permisos nesesarios para realizar esta accion.";      
}
header("Location: ../main/index.php?id_tab=".$_POST["_id_tab"]);
?>

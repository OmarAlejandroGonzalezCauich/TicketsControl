<?php
include_once("conexion.php");
class Seleccion
{	
	var $con;
 
	 //constructor de la clase Seleccion del archivo conexionClase.hp
	 function Seleccion(){
		$this->con = new bd;
	 }
 
	 // //funcion para tipo de usuarios
	 // function tipoSesionUsuario($usuario,$password)
	 // {	 			
	 // 	//Checar validaciÃ³n de variables con isString de php
	 //    if ($this->con->conectar()==true)
	 //    {
	 // 	    return $select=mysql_query("SELECT id_usuario,nombre,correo,contrasena, tipo_usuario FROM usuarios WHERE nombre='".$usuario."'AND contrasena='".$password."' OR correo='".$usuario."' AND contrasena='".$password."' LIMIT 1");
	 // 	}
	 // } 
	 	//funcion para el logeo de usuarios
	 function sesionUsuario($usuario,$password)
	 {	 			
	 	//Checar validacion de variables con isString de php
	    if ($this->con->conectar()==true)
	    {
	 	    return $select=mysql_query("SELECT id_usuario,nombre_tecnico,password,correo FROM usuarios WHERE nombre_tecnico ='".$usuario."'AND password='".$password."' LIMIT 1");
	 	}
	 }
	 function sesionUsuarioCorreo($correo,$passwordCorreo)
	 {	 			
	 	//Checar validacion de variables con isString de php
	    if ($this->con->conectar()==true)
	    {
	    	return $select=mysql_query("SELECT id_usuario,nombre_tecnico,password,correo FROM usuarios WHERE correo ='".$correo."'AND password='".$passwordCorreo."' LIMIT 1");
	 	
	 	}
	 }

	 function verUsuarios()
	 {
	 	if ($this->con->conectar()==true) {
	 	    return $select=mysql_query("SELECT id_usuario,nombre_tecnico FROM usuarios WHERE id_usuario>0");
	 	}
	 }
	 function verUsuariosInformacion()
	 {
	 	if ($this->con->conectar()==true) {
	 	    return $select=mysql_query("SELECT * FROM usuarios WHERE id_usuario>0");
	 	}
	 }
	 function verTicketGen()
	 {
 		if ($this->con->conectar()==true) {
	 	    return $select=mysql_query("SELECT id_ticket,numero_ticket,nombre_cliente,descripcion,fecha,precio,total_pagar,estatus_pago,tecnico FROM tickets WHERE id_ticket>0 ORDER BY numero_ticket DESC");
	 	}
	 }
	 function verNoTicket($ticket)
	 {
 		if ($this->con->conectar()==true) {
	 	    return $select=mysql_query("SELECT * FROM tickets WHERE id_ticket ='".$ticket."'");
	 	}
	 }

	  function verTicketPersonal($valor)
	 {
 		if ($this->con->conectar()==true) {
	 	    return $select=mysql_query("SELECT DISTINCT tickets.id_ticket, tickets.numero_ticket, tickets.nombre_cliente, tickets.descripcion, tickets.fecha, tickets.precio, tickets.total_pagar, tickets.estatus_pago, tickets.tecnico, usuarios.id_usuario, usuarios.nombre_tecnico
	 	    FROM tickets INNER JOIN usuarios ON tickets.tecnico = usuarios.nombre_tecnico WHERE tickets.tecnico =  '".$valor."' LIMIT 0 , 30");
	 	}
	 }
 
	function buscarTecnico($email)
	 {	 			
	 	
	    if ($this->con->conectar()==true)
	    {
	    	$sql="SELECT correo FROM usuarios WHERE correo='".$email."'";
	 	  	//return $select=mysql_query("SELECT usuario,password,email FROM usuarios WHERE usuario ='".$usuario." AND password='".$password."' AND email='".$email."'");  
	 		return $select=mysql_query($sql);  
	 	}
	 }

 	function altaTecnico($usuario,$apellidos,$edad,$sexo,$email,$password)
	 {
 		if ($this->con->conectar()==true) {
	 	    
	 	    $sql="INSERT INTO usuarios (nombre_tecnico,apellido,edad,sexo,password,correo) 
	 	    VALUES ('".$usuario."', '".$apellidos."', '".$edad."', '".$sexo."', '".$password."', '".$email."')";

	 	    //return $select=mysql_query("INSERT INTO usuarios (usuario,password,email) VALUES ('".$usuario."', '".$password."', '".$email."')");
	 	    return $select=mysql_query($sql);
	 	}
	 }
	 function bajaTecnico($usuario,$apellidos,$edad,$sexo,$email,$password)
	 {
 		if ($this->con->conectar()==true) {
	 	    
	 	    $sql="DELETE FROM usuarios WHERE columna";

	 	    //return $select=mysql_query("INSERT INTO usuarios (usuario,password,email) VALUES ('".$usuario."', '".$password."', '".$email."')");
	 	    return $select=mysql_query($sql);
	 	}
	 }
 	//funcion para ver si existe el ticket
 	  function exisTicket($dat1,$dat2,$dat3,$dat4,$dat5,$dat6,$dat7,$dat8)
	 {
 		if ($this->con->conectar()==true) {
	 	    return $select=mysql_query("SELECT * FROM tickets WHERE numero_ticket='".$dat1."' AND nombre_cliente='".$dat2."' AND descripcion='".$dat3."' AND fecha='".$dat4."' AND precio='".$dat5."' AND total_pagar='".$dat6."' AND estatus_pago='".$dat7."' AND tecnico='".$dat8."'");
	 	}
	 }
	 //funcion para ingresar productos
	 function datosInsert($dat1,$dat2,$dat3,$dat4,$dat5,$dat6,$dat7,$dat8)
	  {
	  	if ($this->con->conectar()==true)
	  	{
	  		$estatus="pendiente";
	  		return $select=mysql_query("INSERT INTO tickets (numero_ticket,nombre_cliente,descripcion,fecha,precio,total_pagar,estatus_pago,tecnico) VALUES ('".$dat1."', '".$dat2."', '".$dat3."', '".$dat4."', '".$dat5."', '".$dat6."', '".$dat7."', '".$dat8."')");
	  	}
	  }
 
	
}
?>

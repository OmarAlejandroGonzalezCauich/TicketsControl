<?php
// se verifican que los datos existan
	if(isset($_POST['usuario']) AND isset($_POST['password'])){
		
		if (!empty($_POST['usuario']) OR !empty($_POST['password']) ) {
		// se llaman los scripts de la clase general.class.php
			require_once('general.class.php');
			$sesion = new seleccion;
			// se almacenan en variables los campos del archivo "login.php"
			$usuario = htmlentities($_POST['usuario']);
			$password = htmlentities($_POST['password']);	
			// se alamacena en $consultaUsuario la funcion sisionUsuario
			$consultaUsuario =$sesion->sesionUsuario($usuario,$password);


			if (mysql_num_rows($consultaUsuario)>0) {
				$rsLogin = mysql_fetch_row($consultaUsuario);
				
				session_start();
				$_SESSION['id_login']=$rsLogin[0];
				$_SESSION['Nombrelogin']=$rsLogin[1];
				$_SESSION['activoUsuario']=true;
					header("location:../index.php");
			}else{
				echo "Usuario y/o contraseña incorrectos";
			}

		}
		else{
			echo "Falto ingresar un dato";
		}

	}else{
		echo "Datos no ingresados";
	}
?>
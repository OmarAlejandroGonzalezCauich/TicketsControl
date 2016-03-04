<?php
//Se verifican que se traigan todos los campos del formulario "altaTecnico.php"
	if(isset($_POST['nombre']) AND isset($_POST['apellidos']) AND isset($_POST['edad']) AND isset($_POST['optionsRadios']) AND isset($_POST['email']) AND isset($_POST['password'])){
		
		if (!empty($_POST['usuario']) OR !empty($_POST['apellidos']) OR !empty($_POST['edad']) OR !empty($_POST['optionsRadios']) OR !empty($_POST['email']) OR !empty($_POST['password'])) {
		// Se llaman las funciones de la clase "general.class.php" 
			require_once('general.class.php');
			$crear = new seleccion;
			// se almacenan en variables los campos del archivo "altaTecnico.php"
			$usuario = htmlentities($_POST['nombre']);
			$apellidos = htmlentities($_POST['apellidos']);
			$edad = htmlentities($_POST['edad']);
			$sexo = htmlentities($_POST['optionsRadios']);
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);	
			// se compara el email para saber si existe, en daod caso de que no se crea al nuevo tecnico s
			$busqueda=$crear->buscarTecnico($email);
			if (mysql_num_rows($busqueda)>0) {
					echo '<script language="javascript">alert("Ya Existe Un Usuario Registrado Con Dicho Email, Por Favor Intenta De Nuveo");</script>';
					echo "<script>location.href='altaTecnico.php'</script>";	
				}else{
					$crear->altaTecnico($usuario,$apellidos,$edad,$sexo,$email,$password);
					echo '<script language="javascript">alert("Usario Registrado Correctamente");</script>';
					echo "<script>location.href='../index.php'</script>";	
				}
				// alerta
		}
		else{
			echo '<script language="javascript">alert("Los Campos Estan Vacios, Por Favor Vuleva  intentar");</script>';
			echo "<script>location.href='altaTecnico.php'</script>";
		}
		// alerta
	}else{
		echo '<script language="javascript">alert("Faltaron Algunos Campos Por Rellenar");</script>';
		echo "<script>location.href='altaTecnico.php'</script>";
	}
?>
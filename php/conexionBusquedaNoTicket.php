<?php
//Se verifican que se traigan todos los campos del formulario "index.php" en el apartado de search

	if(isset($_POST['no.Ticket'])){
		
		if (!empty($_POST['no.Ticket'])) {
		// Se llaman las funciones de la clase "general.class.php" 
			require_once('general.class.php');
			$busqueda = new seleccion;
		// se almacenan en variables los campos del archivo "index.php"
			$ticket = htmlentities($_POST['no.Ticket']);
		// se almacena en la b=variable busqueda la funcion altaTecnico
			$busqueda =$busqueda->altaTecnico($ticket);

			if (mysql_num_rows($busqueda)>0) {
				
				echo '<script language="javascript">alert($busqueda);</script>';
			
			}else{
				echo '<script language="javascript">alert("Error al Intentar crear al usuario, intente de nuevo");</script>';
			}

		}
		else{
			echo "Falto ingresar un dato";
		}

	}else{
		echo "Datos no ingresados";
	}
?>
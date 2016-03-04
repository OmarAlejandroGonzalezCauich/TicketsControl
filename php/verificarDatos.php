<?php
// se verifican que los datos existan
	if(isset($_POST['numTicket']) AND isset($_POST['fecha']) AND isset($_POST['descripcion']) AND isset($_POST['cliente']) AND isset($_POST['pagSer']) AND isset($_POST['totPag']) 
		AND isset($_POST['estatus']) AND isset($_POST['dtsTecn'])){
		
		if (!empty($_POST['numTicket']) AND !empty($_POST['fecha']) AND !empty($_POST['descripcion']) AND !empty($_POST['cliente']) AND !empty($_POST['pagSer']) AND !empty($_POST['totPag']) AND !empty($_POST['totPag']) 
			AND !empty($_POST['estatus']) AND !empty($_POST['dtsTecn'])) {


				// se llaman los scripts de la clase general.class.php
				require_once("general.class.php");	
				$objetoform = new seleccion;
				// se almacenan en variables los campos del archivo "modalFormulario.php"
					$dat1= htmlentities($_POST['numTicket']);
					$dat2= htmlentities($_POST['cliente']);
					$dat3= htmlentities($_POST['descripcion']);
					$dat4= htmlentities($_POST['fecha']);
					$dat5= htmlentities($_POST['pagSer']);
					$dat6= htmlentities($_POST['totPag']);
					$dat7= htmlentities($_POST['estatus']);
					$dat8= htmlentities($_POST['dtsTecn']);

				$insert=$objetoform->exisTicket($dat1,$dat2,$dat3,$dat4,$dat5,$dat6,$dat7,$dat8);
				
				if (mysql_num_rows($insert)>0) {

					echo "datos ya ingresados";

				}else{
					$objetoform->datosInsert($dat1,$dat2,$dat3,$dat4,$dat5,$dat6,$dat7,$dat8);
					echo "Datos ingresados correctamente";

				}	

		}else{

			echo "Verificar datos";
		}
	}else{
		echo "sin dato";
	}
?>
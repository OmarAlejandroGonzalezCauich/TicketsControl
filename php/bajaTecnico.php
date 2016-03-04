<?php
session_start();
require_once("general.class.php");	
$objeto = new Seleccion;
$conten=$objeto->verUsuariosInformacion();
?>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<!-- Se almacena en una tabla todos los tecnicos y se da la opcion de borrar uno siempre y cuando se el super usuario sea el logueado-->
<div class="container">
	<div class="table-responsive">
		<table class="table table-striped" id="tickets">
			<tr id="tituloTabla">
				<td id="t1">Id</td>
				<td id="t1">Nombre</td>
				<td id="t1">Apellidos</td>
				<td id="t1">Edad</td>
				<td id="t1">Sexo</td>
				<td id="t1">Password</td>
				<td id="t1">Email</td>
			</tr>
				<?php
					$total1 = 0;
						while($resconten = mysql_fetch_array($conten))
						{
				?>
					<tr id="contenidoTabla">
						<td><?php echo $resconten['id_usuario'];?></td>
						<td><?php echo $resconten['nombre_tecnico'];?></td>
						<td><?php echo $resconten['apellido'];?></td>
						<td><?php echo $resconten['edad'];?></td>
						<td><?php echo $resconten['sexo'];?></td>
						<td><?php echo $resconten['password'];?></td>
						<td><?php echo $resconten['correo'];?></td>	
					</tr>
					<?php
						}
					?>
			</table>
	</div>
</div>
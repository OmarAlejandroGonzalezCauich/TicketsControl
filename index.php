<?php
session_start();
require_once("php/general.class.php");	
$objeto = new Seleccion;
$objeto2 = new Seleccion;
$conten=$objeto->verUsuarios();	
$ticket=$objeto2->verTicketGen();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Index Principal</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/general.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<html>
<body>
<!--
	<div class="id_login"></div>
	<div class="Nombrelogin"></div>
	<div class="activoUsuario"></div>-->
	<div class="container">
		<br>
		<header>
			<nav class="navbar navbar-default "><!--navbar-fixed-top-->
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only">Menu</span>
							<span class="incon-bar">-</span>
							<span class="incon-bar">-</span>
							<span class="incon-bar">-</span>
						</button>
						<a href="index.php" class="navbar-brand"><!--<img src="img/logo.png" alt="Logo TuApp" height="50px" width="50px">-->Control De Tickets</a>
					</div>
					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="">Ultimos 15 Días</a></li>
							<li><a href="">Ultimos 30 Días</a></li>
							<li><a href="php/altaTecnico.php">Dar De Alta A Un Técnico</a></li>
							<li><a href="php/bajaTecnico.php">Dar De Baja A Un Técnico</a></li>
						</ul>
						<form action="php/conexionBusquedaNoTicket.php" class="navbar-form navbar-left" role="search" method="post">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Buscar No. de Ticket" name="no.Ticket">
							</div>
						</form>
					</div>
				</div>
			</nav>
		</header>
	</div>
<div class="container">
	<div class="head">
		<!--<div id="logo"><label id="" alt="Logotipo de la empresa"></label></div>-->
		<div class="row">
			<div class="col-md-6">
				<?php

					if (isset($_SESSION['activoUsuario'])) { 
				?>
					<div id="cuentaUsuario"><?php echo $_SESSION['Nombrelogin'];?></div>	
				<?php
					}else {
				?>
						<div id="cuenta">Cuenta</div> 
				<?php

					}
				?>
			</div>

			<div class="col-md-6">
				<?php
					echo "<a href='index.php'>Salir <?php session_destroy();<?</a>"; 
				?>
			</div>
		</div>
	</div>
	<!-- Se extrae informacion de la base de datos y se almacenan en una tbala-->
	<div class="table-responsive">
		<div class="body">
			<div id="tablaTicket">
				<table class="table table-striped" id="tickets">
					<tr id="tituloTabla">
						<td id="t1">N&#176; ticket</td>
						<td id="t1">Fecha</td>
						<td id="t1">Descripci&oacute;n</td>
						<td id="t1">Cliente</td>
						<td id="t1">Precio servicio</td>
						<td id="t1">Total a pagar</td>
						<td id="t1">Tecnico de servicio</td>
						<td id="t1">Estatus</td>
					</tr>
						<?php
							$total1 = 0;
					 		while($resTickets = mysql_fetch_array($ticket))
					 		{
						?>
						<tr id="contenidoTabla">
							<td><?php echo $resTickets['numero_ticket'];?></td>
							<td><?php echo $resTickets['fecha'];?></td>
							<td><?php echo $resTickets['descripcion'];?></td>
							<td><?php echo $resTickets['nombre_cliente'];?></td>
							<td><?php echo $resTickets['precio'];?></td>
							<td><?php echo $resTickets['total_pagar'];?></td>
							<td><?php echo $resTickets['tecnico'];?></td>
							<td><?php echo $resTickets['estatus_pago'];?></td>	
						</tr>
						<?php
							 
							 $total1 = $total1 + $resTickets['total_pagar'];
							}
						?>
					</table>
				</div>
				</div>
			</div>
			<div id="totalGen">$<?php echo number_format( $total1);?></div>
			<!-- Se imprimen todos los tecnicos disponibles en la base de datos-->
			<div id="tecnicos">
				<?php
					 while($res = mysql_fetch_array($conten)){
				?>
				<label id="usuario" class="<?php echo str_replace(' ','_',$res['nombre_tecnico']);?>_tecn"><strong><?php echo $res['nombre_tecnico'];?></strong></label>
				<?php
					}
				?>
			</div>
</div>
			
		<div class="footer">
			<div id="der"> Derechos reservados <?php echo date('Y');?></div>
		</div>
	</div>
	</div>
	<div class="modal"></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>

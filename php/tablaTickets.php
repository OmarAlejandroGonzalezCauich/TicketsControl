<?php
// se verifica que usuario este registrado 
session_start();
if(isset($_POST['dataUsu'])){
$valor=$_POST['dataUsu'];

$totalPer=0;

require_once("general.class.php");	
$objeto = new Seleccion;
$ticket=$objeto->verTicketPersonal($valor);
// se almacena en ticket la funcion  verTicketPersonal que esta en el archivo general.class.php
?>
	<!--Se crea una tabla que contendra el ticket personal-->
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
		//se almacenan en las diferentes columnas la informacion que este en la base de datos
			$total = mysql_num_rows($ticket);
			if ($total!=0) {
			while($res = mysql_fetch_array($ticket))
	 		{
		?>
		<tr id="contenidoTabla">
			<td><?php echo $res['numero_ticket'];?></td>
			<td><?php echo $res['fecha'];?></td>
			<td><?php echo $res['descripcion'];?></td>
			<td><?php echo $res['nombre_cliente'];?></td>
			<td><?php echo $res['precio'];?></td>
			<td><?php echo $res['total_pagar'];?></td>
			<td class="idNombreTecnico" id="<?php echo $res['tecnico'];?>"><?php echo $res['tecnico'];?></td>
			<td><?php echo $res['estatus_pago'];?></td>	
		</tr>
		<?php
			 $totalPer = $totalPer + $res['total_pagar'];

			}
		}else{
		?>
		<tr id="contenidoTabla">
			<td colspan="8"><?php echo"No tiene ningun Ticket";?></td>
		</tr>
		<?php
		}
		?>
	</table>
	
	<div id="totalPersonal">Total realizado $<?php echo number_format( $totalPer);?></div>
	<?php
		$base=5000;
	 if ($totalPer>$base){?>
		<div id="totalPersonal">has superado los 5 mil</div>
	<?php
	// se sacan las comiciones de cada tecnico
		$comision=$totalPer-$base;
		$extra= $comision*1.30;
		$totalComision= $extra-$comision;
		$totalQuincena=$totalComision+1500;
	?>
	<div id="totalPersonal">Comisiones = $ <?php echo $totalComision;?></div>
	<div id="totalPersonal">Pago = $ <?php echo $totalQuincena;?></div>
	<?php
		}

	if (isset($_SESSION['activoUsuario'])) {  
	?>

	<label id="agregar" onclick="openVentana();" >Agregar</label>
	<label id="editar" onclick="openVentana();">Editar</label>
	<!--<label id="Asignar">Reasignar tickets</label>-->
	<a href="index.php" id="general">Ver General</a>
<?php
	}
}else{
	echo "Usuario no existente";
}
?>
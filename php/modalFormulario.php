<?php

if(isset($_POST['dataUsu2'])){
$valor=$_POST['dataUsu2'];

// require_once("general.class.php");	
// $objeto = new Seleccion;
// $tecn=$objeto->verTicketPersonal($valor);
?>

<div class="container">
	<div class="ventana">
		<div class="cerrar"><a href="javascript:closeVentana();"></a></div>

		<div id="formulario1">
		<table class="table-responsive">
			<form id="newTicket">
				<td id="numeroTicket">Ticket : <input type="text" class="numTicket"  name="numTicket"/></div></td>
				<td id="fechaTicket">Fecha : <input type="date" class="fecha" name="fecha"/></div></td>
				<td id="descripcionTicket">Descripcion : <input type="text" class="descripcion" name="descripcion"/></div></td>
				<td id="clienteTicket">Cliente : <input type="text" class="cliente" name="cliente"/></div></td>
				<td id="pagSerTicket">Precio Servicio : <input type="text" class="pagSer" name="pagSer"/></div></td>
				<td id="totPagTicket">Total a pagar : <input type="text" class="totPag" name="totPag"/></div></td>
				<td  id="estatusTicket">Estatus : 
					<select  name="estatus" id="estatusSelect" >
						<option value="Pagado">Pagado</option>
						<option value="No pagado">No pagado</option>
					</select>
				</div>
				<input type="hidden" name="dtsTecn" value="<?php echo $valor;?>" class="dtsTecn" />
			</form>				
		</table>
			<label id="nuevo_guardar">Guardar</label>

		</div>

	</div>
</div>
<?php
}
?>
<?php
if(isset($_POST['numero_tikect'])){
$valor=$_POST['numero_tikect'];
/*
require_once("php/general.class.php");	
$objeto = new Seleccion;
$objeto2 = new Seleccion;
$tecnico = objeto->verTicketPersonal($valor);
*/
?>
<!--Este es el modelo que agarra la funcion de JQuery  el cual la usa para crear y moficiar tickets-->
<div class="container">
	<div class="ventana">
		<div class="cerrar"><a href="javascript:closeVentana();"></a></div>

		<div id="formulario1">
			<form id="newTicket">
				<div id="numeroTicket">Ticket : <input type="text" class="numTicket"  name="numTicket"/></div>
				<div id="fechaTicket">Fecha : <input type="date" class="fecha" name="fecha"/></div>
				<div id="descripcionTicket">Descripcion : <input type="text" class="descripcion" name="descripcion"/></div>
				<div id="clienteTicket">Cliente : <input type="text" class="cliente" name="cliente"/></div>
				<div id="pagSerTicket">Precio Servicio : <input type="text" class="pagSer" name="pagSer"/></div>
				<div id="totPagTicket">Total a pagar : <input type="text" class="totPag" name="totPag"/></div>
				<div id="estatusTicket">Estatus : 
					<select  name="estatus" id="estatusSelect" >
						<option value="Pagado">Pagado</option>
						<option value="No pagado">No pagado</option>
					</select>
				</div>
				<input type="hidden" name="dtsTecn" value="<?php echo $valor;?>" class="dtsTecn" />
			</form>				

			<label id="nuevo_guardar" color="#000">Guardar</label>

		</div>

	</div>
</div>
<?php
}
?>

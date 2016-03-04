$(document).ready(function(){

	$("body").on("click","div#tecnicos label#usuario", function(){
		var data=$(this).attr('class');
		var data1 = data.replace('_tecn', '');
		$.ajax({
			data:{ dataUsu:data1 },
			type:'POST',
			url:'php/tablaTickets.php',
			success:function(rspta){
				$("#tablaTicket").html(rspta);
			}
		});
	});

	$("body").on("click","div#tecnicos label#usuario", function(){
		var data=$(this).attr('class');
		var data1 = data.replace('_tecn', '');
		$("#totalGen").slideUp("slow");
	});
	

	$("body").on("click","#agregar", function(){
		var dataUs=$(".idNombreTecnico").attr('id');
		$.ajax({
			data:{ dataUsu2:dataUs },
			type:'POST',
			url:"php/modalFormulario.php",
			cache: false,
			success: function(rspta){
				$(".modal").html(rspta);
			}
		});		
	});

	//funcion para cargar datos en el modal
	// $("body").on("click","label#agregar",function(){
	// 	$.ajax({
	// 		url:"php/modalFormulario.php",
	// 		cache: false,
	// 		success: function(rspta){
	// 			$(".modal").html(rspta);
	// 		}
	// 	});		
	// });
	//funcion para entrar a la cuenta 
	$("body").on("click","#cuenta",function(){
		
		$.ajax({
			url:"php/login.php",
			success:function(rspta){
				$(".modal").html(rspta).modal('show');
				openVentana();
			}
		});
	});
	//funcion para guardar datos del ticket
	$("body").on("click","#nuevo_guardar",function(){
		var dtsForm = $(this).parent().find(":input,select").serialize();
		alert($(this).parent().html());
			$.ajax({
				data:dtsForm,
				type:'POST',
				url:"php/verificarDatos.php",
				success: function(rspta){
					$(".modal").html(rspta);
				}
			});

	});
	//funcion para guardar datos del ticket
	$("body").on("click","#entrar",function(){
		var dtsFormLogin = $("#iniciarSesion").serialize();
			$.ajax({
				data:dtsFormLogin,
				type:'POST',
				url:"php/conexionLogin.php",
				cache:false,
				success: function(rspta){
					/*if (rspta="Usuario y/o contraseña incorrectos") {
						$("#respLogin").slideDown("slow");
						$("#respLogin").html(function(){
							$("#respLogin").html(rspta).css({"color":"rgba(255,255,255,1)", "float":"left", "width":"100%", "text-align": "center", "margin-top":"15px"});
							setTimeout(ocultarLogin,3000);
						});

						function ocultarLogin(){
							$("#respLogin").slideUp("slow");
						}
					}
					else{*/
						window.location.href="index.php";
					//}
				}

			});
	});
});

function openVentana(){	
	$(".modal , .ventana").fadeIn();
}
function closeVentana(){
	$(".ventana , .modal").slideUp("fast");
}
//ocultar el modal al presionar la tecla ESC
$(document).keyup(function(event){
    if(event.which==27)
    {
        $(".ventana , .modal").slideUp();
    }
});

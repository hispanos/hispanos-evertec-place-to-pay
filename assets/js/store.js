//Función para la notificación de alertas
mensaje = function (titulo,mensaje,tipo) {
	$.notify({
		title: titulo,
		message: mensaje
	},{
		type: tipo,
		placement: {
			from: "bottom",
			align: "center"
		},
		delay: 400,
	});
}

//Función para enviar los datos de usuario
submitData = function () {
	//Valido que todos los datos estén llenos
	if ($("#customer_name").val().length >= 1 && $("#customer_email").val().length >= 1 && $("#customer_mobile").val().length >= 1) {
	    var data = new FormData();
	    var other_data = $('#form_customer_data').serializeArray();
	    $.each(other_data,function(key,input){
	        data.append(input.name,input.value);
	    });
	    jQuery.ajax({
	        url: baseurl+'store/saveData',
	        data: data,
	        cache: false,
	        contentType: false,
	        processData: false,
	        type: 'POST',
	        success: function(resul){
	        	resultado = $.parseJSON(resul); //Parseo el resultado como json
	            if (resultado.estado == 'bien') {
	                window.location.href=baseurl+'store/resume/'+resultado.id_order;
	            }else{
	                mensaje('<strong>'+resultado.estado+'</strong>',resultado.mensaje,'danger');
	            }
	        }
	    });
	}else{
		mensaje('<strong>Oops!</strong>','No puedes dejar datos vacíos.','warning');
	}
}
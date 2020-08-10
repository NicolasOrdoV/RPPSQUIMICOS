$(document).ready(function(){
	$.ajax({
		url: 'paginasUsuario/datesLocates.php?Accion=getLocalidades',
		success:function(Datos){
			for (x = 0;x<Datos.length;x++) 
			{
				$("#cbLocalidades").append(new Option(Datos[x].nombreLOCALIDAD, Datos[x].idLOCALIDAD));
			}
		}
	})

	$('#cbLocalidades').change(function(){
		$('#cbBarrios').empty();
		$getJSON('paginasUsuario/datesLocates.php',{Accion:'GetBarrios',idLOCALIDAD:$('#cdLocalidades option:select').val()},function(){
            for (x = 0; x<Datos.length; x--) {
            	$('#cdBarrios').append(new Option(Datos[x].nombreBARRIO, Datos[x].idBARRIO))
            }
		})
	})
})
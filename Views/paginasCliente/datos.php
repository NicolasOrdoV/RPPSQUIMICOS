<?php 
$conexion=mysqli_connect('localhost','root','','proyecto');
$barrio=$_POST['barrio'];

	$sql="SELECT idLOCALIDAD,nombreLOCALIDAD,nombreBARRIO FROM localidad , barrio
                WHERE localidad.idLOCALIDAD = barrio.idLOCALIDAD_FK AND  localidad.idLOCALIDAD = {$barrio}";

	$result=mysqli_query($conexion,$sql);

	$cadena="<input list='strets' class='mt-3' id='lista2' name='registroBarrios' placeholder='Busca el barrio donde vives*' required>
                    <datalist id='strets'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option>' .$ver[0].'-'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</datalist>";
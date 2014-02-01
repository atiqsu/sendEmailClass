<?php

require_once('class/myCustomEmail.php');

$sendEmail = new myCustomEmail;

// Recogemos los distintos inputs
$names = array('Nombre: ' => 'nombre', 'Apellidos: ' => 'apellidos', 'Telefono: ' => 'telefono', 'Dirección: ' => 'direccion');
$sendEmail->getInputs($names);

// Drección al que va dirigido el mensaje
$sendEmail->to('daniel_ariza@exclusivedesign.es');

// El email que manda el email recoge el post del input email 'Si no hay parámetro no se envía'
$sendEmail->from('email');

//dirección de respuesta, si queremos que sea distinta que la del remitente seleccionamos otro name de un input (type="hidden" si es oculto)
$sendEmail->replayTo('email');

//direcciones que recibián copia 'Opcional'
$sendEmail->cc('concopia@gmail.com');

//direcciones que recibirán copia oculta 'Opcional'
$sendEmail->bcc('copiaoculta@copiaoculta.es');

// Asunto del mensaje personalizado 'Opcional'
$sendEmail->subget('Esto es un asunto personalizado');

// Si enviamos el formulario, detecto name del botón submit
if($_POST['submit']) {
	
	$successSend = 'Mensaje envíado correctamente';
	$errorSend = 'Ha ocurrido un error al enviar el mensaje';
	
	// Enviando el email
	$sendEmail->composeEmail($successSend, $errorSend);
	
}

?>

<form action="" method="POST">

	<input type="text" name="nombre" placeholder="Nombre" />
	<br>
	<input type="text" name="apellidos" placeholder="Apellidos" />
	<br>
	<input type="text" name="telefono" placeholder="Telefono" />
	<br>
	<input type="text" name="direccion" placeholder="Direccion" />
	<br>
	<input type="text" name="email" placeholder="Email" />
	<br>
	<input type="submit" name="submit" value="Enviar" />
	
</form>
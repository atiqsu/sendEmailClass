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

//direcciones que recibián copia 'Opcional'
$sendEmail->cc('concopia@gmail.com');

//dirección de respuesta, si queremos que sea distinta que la del remitente 'Opcional'
$sendEmail->replayTo('tu@tu.es');

//direcciones que recibirán copia oculta 'Opcional'
$sendEmail->bcc('copiaoculta@copiaoculta.es');

// Asunto del mensaje personalizado 'Opcional'
$sendEmail->subget('Esto es un asunto personalizado');

// Enviando el email
$sendEmail->composeEmail();

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
	<input type="submit" value="Enviar" />
	
</form>
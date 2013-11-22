<?php

class myCustomEmail {

	var $names;
	var $toEmail;
	var $from;
	var $replayTo;
	var $cc;
	var $bcc;
	var $subget;
	var $headers;
	
	var $mensaje;
	
	public function getInputs($names = '') {
	
		$this->names = $names;
		
		$mensaje = $this->mensaje;
		
		foreach($this->names as $encabezado => $name) {
		
			if( $_POST[$name] != '' ) {
			
				$mensaje .= $encabezado . ' ' . $_POST[$name] . '<br>';
				
			}
		
		}
		
		return $mensaje;
		
	}
	
	public function to($toEmail) {
		
		$this->to = $toEmail;
		
		return $toEmail;
		
	}
	
	public function from($email = '') {
		
		$this->from = $email;
	
		return $this->from = $_POST[$this->from];
		
	}
	
	public function replayTo($replayTo = '') {
		
		$this->replayTo = $replayTo;
	
		return $this->replayTo;
		
	}
	
	public function cc($cc = false) {
		
		$this->cc = $cc;
		
		return $this->cc = $cc;
		
	}
	
	public function bcc($bcc = false) {
		
		$this->bcc = $bcc;
		
		return $this->bcc;
		
	}
	
	public function subget($subget) {
	
		$this->subget = $subget;
		
		return $this->subget;
		
	}
	
	private function head() {
		
		//para el envío en formato HTML
		$this->headers = "MIME-Version: 1.0\r\n";
		$this->headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		//dirección del remitente
		$this->headers .= "From: $this->from($this->from); \r\n";
		
		//dirección de respuesta, si queremos que sea distinta que la del remitente
		$this->headers .= "Reply-To: $this->replayTo($this->replayTo); \r\n";
			
		//ruta del mensaje desde origen a destino
		$this->headers .= "Return-path: holahola@desarrolloweb.com\r\n";
		
		//direcciones que recibián copia
		$this->headers .= "Cc: $this->cc($this->cc); \r\n";
		
		//direcciones que recibirán copia oculta
		$this->headers .= "Bcc: $this->bcc($this->bcc); \r\n"; 
		
		return $this->headers;	
	
	}
	
	public function bodyMsg() {
	
		// message
		$mensaje = '
		<html>
		<head>
		  <title>Recordatorio de cumpleaños para Agosto</title>
		</head>
		<body>';
		
		$mensaje .= $this->getInputs($this->names);
		
		$mensaje .= '</body>
		</html>
		';
		
		return $mensaje;
		
	}
	
	public function composeEmail() {
		
		// Varios destinatarios
		$recipientEmail  = $this->to($this->to);
		
		// subject
		$subget = $this->subget($this->subget);
		
		// Mail it
		if( mail($recipientEmail, $subget, $this->bodyMsg(), $this->head() ) ) {
			
			echo 'Mensaje enviado con éxito.';
			
		} else {
			
			echo 'Ha ocurrido un error al enviar el mensaje.';
			
		}
		
	}
	
}

?>
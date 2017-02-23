<?php
if (isset($_POST["contacto"])) {
	extract($_POST);

	$to = "contacto@fodina.co";
	$subject = "Contácto Web Fodina ";

	$message = "
	<!DOCTYPE html>
  	<html>
	<head>
	<title>Mensaje de web Fodina</title>
	</head>
	<body>
	<p>Mensaje de www.fodina.co</p>
	<table>
	<tr>
	<th>Nombre</th>
	<th>".$nombre."</th>
	</tr>
	<tr>
	<th>Apellido</th>
	<th>".$apellido."</th>
	</tr>
	<tr>
	<th>Teléfono</th>
	<th>".$telefono."</th>
	</tr>
	<tr>
	<th>Email</th>
	<th>".$email."</th>
	</tr>
	<tr>
	<th>Mensaje</th>
	<th>".$mensaje."</th>
	</tr>	
	</table>
	</body>
	</html>";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: FODINA <webmaster@fodina.co>' . "\r\n";

	if(mail($to,$subject,$message,$headers)){
		echo "<script>alert('Gracias por escribirnos, pronto te contactaremos'); window.location='index.html';</script>";
	}else{
		echo "<script>alert('Algo salió mal, por favor intenta de nuevo'); window.location='index.html';</script>";
	}
}
?>
<?php 
if (isset($_POST["aportarMonto"])) {

	extract($_POST);

	if (isset($monto) && $monto>0) {	

		$stamp = date("Ymdhis");
		$rnd = str_pad(rand(0,999999),6, "0", STR_PAD_LEFT);
		$codigo = "$stamp-$rnd";
		$referenceCode = $codigo;

		$description = "APORTE MENSUAL DE $".number_format($monto);

		//Production
		$signature=md5("o893UPGuh0ONa3JWX4D5ooZ4wn~622809~".$referenceCode."~".$monto."~COP");

		//Testign
		//$signature=md5("4Vj8eK4rloUd272L48hsrarnUA~508029~".$referenceCode."~".$monto."~COP");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pago Payu</title>
</head>
<body onload="enviar_form()">
	 <form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/" id="form">	
	   <input type="hidden" name="merchantId" id="merchantId" value="622809">
	    <input type="hidden" name="ApiKey" id="ApiKey" value="o893UPGuh0ONa3JWX4D5ooZ4wn">
	    <input type="hidden" name="referenceCode" id="referenceCode" value="<?=$referenceCode?>">
	    <input type="hidden" name="accountId" id="accountId" value="625139">
	    <input type="hidden" name="description" id="description" value="<?=$description?>">
	    <input type="hidden" name="currency" id="currency" value="COP">	    
	    <input type="hidden" name="amount" id="amount" value="<?=$monto?>">
	    <input type="hidden" name="tax" id="tax" value="0">
	    <input type="hidden" name="taxReturnBase" id="taxReturnBase" value="0">
	    <input type="hidden" name="lng" id="lng" value="ES">	        
	    <input type="hidden" name="test" id="test" value="0">	    
	    <input type="hidden" name="responseUrl" id="responseUrl" value="http://fodina.co/gracias.html">	    	    
	    <input type="hidden" name="signature" value="<?=$signature?>">
	</form>

	    <!--testing-->
	    <!--<form method="post" action="https://sandbox.gateway.payulatam.com/ppp-web-gateway" id="form">
	    <input type="hidden" name="merchantId" id="merchantId" value="508029">
	    <input type="hidden" name="ApiKey" id="ApiKey" value="4Vj8eK4rloUd272L48hsrarnUA">
	    <input type="hidden" name="referenceCode" id="referenceCode" value="<?=$referenceCode?>">
	    <input type="hidden" name="accountId" id="accountId" value="512321">
	    <input type="hidden" name="description" id="description" value="<?=$description?>">
	    <input type="hidden" name="currency" id="currency" value="COP">	    
	    <input type="hidden" name="amount" id="amount" value="<?=$monto?>">
	    <input type="hidden" name="tax" id="tax" value="0">
	    <input type="hidden" name="taxReturnBase" id="taxReturnBase" value="0">
	    <input type="hidden" name="lng" id="lng" value="ES">	        
	    <input type="hidden" name="test" id="test" value="1">	    
	    <input type="hidden" name="responseUrl" id="responseUrl" value="http://fodina.co/gracias.html">	    	    
	    <input type="hidden" name="signature" value="<?=$signature?>">-->

	</form>
	<script type="text/javascript">
		function enviar_form(){
			document.getElementById("form").submit();
		}
	</script>
</body>
</html>
<?php } } ?>
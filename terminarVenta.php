
<?php
include_once "./bd/base_de_datos.php";
//Abre la conexion a la base de datos
if (isset($_REQUEST['idProductos'])){
	$product_id=base64_decode(($_REQUEST['id']));//Descodifica la variable con base64_decode
	$product_id=intval($product_id);//Convierto el valor recibido en un entero
	//A continuacion realizar una consulta a la base de datos 
	//Para verificar el valor pasado
	$data = array('product_id' => $product_id);
	$query = Select_Record_By_One_Filter($data, 'tbl_product_detail');
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$result = $query->fetch();
	$product_name = $result['product_name'];//Nombre del producto
	$product_price = $result['product_price'];//Precio del producto
	$product_currency = $result['product_currency'];//Moneda del producto 
	cerrar_conexion();//Cierro la conexion a la base de datos
	
	
	//URL Paypal Modo pruebas.
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	//URL Paypal para Recibir pagos 
	//$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
	//Correo electronico del comercio. 
     $merchant_email = 'joaquinobed123456@gmail.com';
	//Pon aqui la URL para redireccionar cuando el pago es completado
	$cancel_return = "http://localhost/paypal-integracion/productos.php";
	//Colocal la URL donde se redicciona cuando el pago fue completado con exito.
	$success_return = "http://localhost/paypal-integracion/success.php";
?>
<div style="margin-left: 40%"><img src="img/processing_animation.gif"/>
<form name="myform" action="<?php echo $paypal_url; ?>" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="cancel_return" value="<?php echo $cancel_return ?>">
<input type="hidden" name="return" value="<?php echo $success_return; ?>">
<input type="hidden" name="business" value="<?php echo $merchant_email; ?>">
<input type="hidden" name="lc" value="C2">
<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
<input type="hidden" name="item_number" value="<?php echo $product_id; ?>">
<input type="hidden" name="amount" value="<?php echo $product_price; ?>">
<input type="hidden" name="currency_code" value="<?php echo $product_currency; ?>">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
</form>
<script type="text/javascript">
document.myform.submit();
</script>
<?php	
	
} else {
	header("location:productos.php");
	exit;
}
?>

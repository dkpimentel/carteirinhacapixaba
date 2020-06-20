<?php 

/*********************************************************
 * Início: Alterar campos do checkout woocommerce
 *********************************************************/
function wpi_altera_campo_comentario ($filed){

	unset($filed['order']['order_comments']);
	unset($filed['order']['order_comments']['label']);


	//$filed['order']['order_comments']['type'] = 'date';
	//$filed['order']['order_comments']['label'] = 'Data Nascimento';
	//$filed['order']['order_comments']['required'] = true;

	return $filed;
	
}

add_filter ('woocommerce_checkout_fields', 'wpi_altera_campo_comentario');
/*********************************************************
 * Término: Alterar campos do checkout woocommerce
 *********************************************************/




 ?>
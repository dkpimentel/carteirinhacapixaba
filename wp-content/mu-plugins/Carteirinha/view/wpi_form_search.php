<?php 

/*********************************************************
 * Início: Formulário CPF
 *********************************************************/
function wpi_find_cpf(){

$urlCart = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/search-cpf/#";


	echo '
	<form method="GET" class="woocommerce-product-search" action="' . $urlCart . '">
		<input type="text" name="cpf" value=""><br><br>
		<input type="submit" value="Consultar">
	</form>';
	
 
}
/*********************************************************
 * Término: Formulário CPF
 *********************************************************/

?>

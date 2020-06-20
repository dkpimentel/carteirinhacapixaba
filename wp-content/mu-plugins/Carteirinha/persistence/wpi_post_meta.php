<?php 

/*
 * Início: Função que seleciona o ultima order gerada
 */
function wpi_select_id_cpf_cont($cpf) {
	
	global $wpdb;

	$query = 'SELECT post_id FROM wp_postmeta WHERE meta_value LIKE "' . $cpf . '"';

	$data = $wpdb->get_results($query, "ARRAY_A");

	foreach ($data[count($data) - 1] as $key => $value) {
		//Retorna o post_id
		return $value;
	}
	//Retorna falso se o cpf não existir
	return "";

}
/*
 * Término: Função que seleciona o ultima order gerada
 */

/*
 * Início: Função que seleciona um array de post_meta da 
 */
function wpi_select_post_meta_array_int($post_id) {

	global $wpdb;

	$query = 'SELECT * FROM wp_postmeta WHERE post_id LIKE "' . $post_id . '"';

	return $wpdb->get_results($query, "ARRAY_A");

}
/*
 * Término: Função que seleciona um array de post_meta
 */

 ?>
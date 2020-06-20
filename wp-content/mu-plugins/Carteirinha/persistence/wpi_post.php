<?php 

/*
 * Início: Função que seleciona a ultima foto enviada
 */
function wpi_select_wp_post_int($id) {

	global $wpdb;

	//$query = 'SELECT max(post_title) FROM wp_posts WHERE post_parent LIKE "' . $id . '"';
	$query = 
	'SELECT post_title, post_mime_type, guid FROM wp_posts WHERE id LIKE (SELECT MAX(id) FROM wp_posts WHERE post_parent LIKE "' . $id . '")';

	//select post_title from wp_posts where id like (select max(id) from wp_posts where post_parent like 925)

	$data = $wpdb->get_results($query, "ARRAY_A");
	//$data = $wpdb->get_row();

	/*foreach ($data as $index1 => $value1) {
		foreach ($data[$index1] as $index2 => $value2) {
			return $value2;
		}
		break;
	}*/

	return $data;

}
/*
 * Término: Função que seleciona o array de post
 */

/*
 * Início: Função que seleciona o status do post
 */
function wpi_select_wp_post_status($id) {

	global $wpdb;

	$query = 'SELECT post_status FROM wp_posts WHERE id LIKE "' . $id . '"';

	$data = $wpdb->get_results($query, "ARRAY_A");
	//$data = $wpdb->get_row();

	foreach ($data as $index1 => $value1) {
		foreach ($data[$index1] as $index2 => $value2) {
			return $value2;
		}
		break;
	}

}
/*
 * Término: Função que seleciona o array de post
 */

 ?>
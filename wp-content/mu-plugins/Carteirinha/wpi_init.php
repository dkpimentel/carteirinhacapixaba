<?php

/*
 * Incluindo as view
 */
include "view/wpi_form_search.php";
include "view/wpi_form_checkout.php";

/*
 * Incluindo os controllers
 */
include "controller/wpi_util.php";

/*
 * Incluindo os persistencia
 */
include "persistence/wpi_post_meta.php";
include "persistence/wpi_post.php";

/*
 * Início: Removendo campos do checkout
 */
//wpi_altera_campo_comentario($field);
/*
 * Término: Removendo campos do checkout
 */

/*
 * Início: Formulario de consulta CPF
 */
function wpi_form_search() {

	wpi_find_cpf();

}
add_shortcode('wpi_form_search', 'wpi_form_search');
/*
 * Término: Formulário de consulta CPF
 */

/*
 * Início: Valida CPF
 */
function wpi_valida_cpf_ini() {

	if (empty($_GET['cpf'])) {

		echo "";

	} elseif (wpi_val_cpf_uti($_GET['cpf'])) {

		//Valida CPF
		$cpfInt = wpi_valida_num_int($_GET['cpf']);

		//Coloca máscara no cpf
		$cpfMask = wpi_mask_cpf_init(wpi_valida_num_int($_GET['cpf']), "###.###.###-##");

		//Retorna a ultima order do CPF
		$numOrder = wpi_select_id_cpf_cont($cpfInt);

		//Retornar uma lista com todos atributos meta da order
		$post_meta_array = wpi_select_post_meta_array_int($numOrder);

		//Retorna o nome da ultima foto postada e o tipo
		$dadosPhoto = wpi_select_wp_post_int($numOrder);

		//Retorna o status da order
		$statusOrder = wpi_valida_status_init(wpi_select_wp_post_status($numOrder));

		//Url da página para gerar a carteirinha
		//	$urlCart = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/gera-carteirinha.php";
		$urlCart = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" .
			"/wp-content/mu-plugins/Carteirinha/view/wpi-gera-carteirinha.php";

		//Filtrando os valores do array de post_meta
		foreach ($post_meta_array as $index1 => $value) {

			foreach ($post_meta_array[$index1] as $index2 => $value) {

				if ($post_meta_array[$index1][$index2] == '_billing_first_name') {
					$nome = $post_meta_array[$index1]['meta_value'];
				}

				if ($post_meta_array[$index1][$index2] == '_billing_last_name') {
					$sobrenome = $post_meta_array[$index1]['meta_value'];
				}

				if ($post_meta_array[$index1][$index2] == '_billing_wooccm11') {
					$cpf = wpi_mask_cpf_init($post_meta_array[$index1]['meta_value'], "###.###.###-##");
				}

				if ($post_meta_array[$index1][$index2] == '_customer_user') {
					$matricula = "00" . $post_meta_array[$index1]['meta_value'];
				}

				if ($post_meta_array[$index1][$index2] == '_billing_wooccm12') {
					$dtNascimento = $post_meta_array[$index1]['meta_value'];
				}

			}
		}

		/*
			 * Ínicio: Link da imagem da carteirinha
		*/
		$lastPhoto1 = $dadosPhoto[0]["post_title"];
		$lastPhoto = str_replace(" ", "-", $lastPhoto1);
		
		$tipoPhoto1 = str_replace("image/", "", $dadosPhoto[0]["post_mime_type"]);
		//$tipoPhoto = str_replace("e", "", $tipoPhoto1);

		$guid = str_replace(".", "", substr($dadosPhoto[0]["guid"], -4));


		$hs_par = array($nome, $sobrenome, $matricula, $cpf, $linkPerfil, $dtNascimento, $validade, $guid);
				


		//Gera o link da foto com o tamanho de 100x100px
		//$linkPerfil = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/wp-content/uploads/wooccm_uploads/" . $lastPhoto . "-100x100." . $tipoPhoto;
		$linkPerfil = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/wp-content/uploads/wooccm_uploads/" . $lastPhoto . "-100x100." . $guid;
		/*
			 * Término: Link da imagem da carteirinha
		*/

		echo '<div align="left">';

		echo '<img src= "' . $linkPerfil . '"/>';

		echo "<br>Nome   : " . $nome . " " . $sobrenome;
		echo "<br>CPF    : " . $cpf;
		echo "<br>Matricula    : " . $matricula;
		echo "<br>Data Nascimento    : " . $dtNascimento;
		echo "<br>Status Order : " . $statusOrder;
		echo "<br>Número do Pedido: " . $numOrder . "<br>";
		echo "<br><br> Hash:" . md5($comp);


		if ($statusOrder == "Cadastro Ativo") {

			//echo '<br><br><a href="' . $urlCart . '?nome=' . $nome . ' ' . $sobrenome . '&matricula=' . $matricula . '&cpf=' . $cpf . '&perfil=' . $linkPerfil . '&dtnacimento=' . $dtNascimento . '&validade=' . $validade . '&tipo=' . $tipoPhoto . '" target="_blank">Vizualizar Carteirinha</a>';


			//echo '<br><br><a href="' . $urlCart . '?nome=' . $nome . ' ' . $sobrenome . '&matricula=' . $matricula . '&cpf=' . $cpf . '&perfil=' . $linkPerfil . '&dtnacimento=' . $dtNascimento . '&validade=' . $validade . '&tipo=' . $guid . '" target="_blank">Vizualizar Carteirinha</a>';

			echo '<br><br><a href="' . $urlCart . '?tag=' .md5($comp) . '" target="_blank">Vizualizar Carteirinha</a>';


		} else {
			echo "<br><br><p color:'red'>Porfavor contate nosso suporte para regularizar seu cadastro.</p>";
		}

		echo '</div>';

	} else {

		echo '<h3 align="center">Informe um CPF Válido</h3>';

	}

}
add_shortcode('wpi_valida_cpf_ini', 'wpi_valida_cpf_ini');
/*
 * Término: Valida CPF
 */

?>

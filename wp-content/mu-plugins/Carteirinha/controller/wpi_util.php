<?php 


/*
 * Início: Valida CPF
 */
function wpi_val_cpf_uti($cpf){

	// Extrai somente os números
	$cpf = preg_replace('/[^0-9]/is', '', $cpf);

	// Verifica se foi informado todos os digitos corretamente
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	if (preg_match('/(\d)\1{10}/', $cpf)) {
		return false;
	}
	// Faz o calculo para validar o CPF
	for ($t = 9; $t < 11; $t++) {
		for ($d = 0, $c = 0; $c < $t; $c++) {
			$d += $cpf{$c} * (($t + 1) - $c);
		}
		$d = ((10 * $d) % 11) % 10;
		if ($cpf{$c} != $d) {
			return false;
		}
	}
	return true;

}
/*
 * Término: Valida CPF
 */


/*
 * Início: Retorna só números
 */
function wpi_valida_num_int($numero) {

	$nun = preg_replace("/[^0-9]/", "", $numero);

	return $nun;

}
/*
 * Térmiino: Retorna só números
 */


/*
 * Início: Máscara do CPF
 */
function wpi_mask_cpf_init($val, $mask) {
	$maskared = '';
	$k = 0;
	for ($i = 0; $i <= strlen($mask) - 1; $i++) {
		if ($mask[$i] == '#') {
			if (isset($val[$k])) {
				$maskared .= $val[$k++];
			}

		} else {
			if (isset($mask[$i])) {
				$maskared .= $mask[$i];
			}

		}
	}
	return $maskared;
}
/*
 * Término: Máscara do CPF
 */

/*
 * Início: Retorna status da order
 */
function wpi_valida_status_init($status) {

	switch ($status) {

	case 'wc-completed':
		return "Cadastro Ativo";
		break;

	case 'wc-pending':
		return "Inativo <br>Pagamento pendente.";
		break;

	case 'wc-processing':
		return "Inativo <br>Processando pagamento.";
		break;

	case 'wc-On-Hold':
		return "Inativo <br>Aguardando pagamento.";
		break;

	case 'wc-cancelled':
		return "Inativo <br>Cancelado.";
		break;

	case 'wc-refunded':
		return "Inativo <br>Pagamento estornado.";
		break;

	case 'wc-failed':
		return "Inativo <br>Falha no pagamento.";
		break;

	default:
		return "Cadastro Inativo";
		break;

	}

}
/*
 * Término: Retorna status da order
 */



 ?>
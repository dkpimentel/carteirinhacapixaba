<?php

//Para imagens PNG
function wpi_gera_carteira_png($nomeCompleto, $matricula, $cpf, $perfil, $dtnacimento, $validade) {

	$image = imagecreatefrompng((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/wp-content/uploads/cart1.png");

	$imageCart = imagecreatefrompng($perfil);

	$titleColor = imagecolorallocate($image, 255, 255, 255);
	$gray = imagecolorallocate($image, 100, 100, 100);
	$black = imagecolorallocate($image, 0, 0, 0);

	imagecopymerge($image, $imageCart, 60, 177, 0, 0, imagesx($imageCart), imagesy($imageCart), 100);

	imagestring($image, 5, 170, 175, "NOME  " . strtoupper($nomeCompleto), $titleColor);
	imagestring($image, 5, 170, 205, "CPF  " . $cpf, $titleColor);
	imagestring($image, 5, 170, 235, "MATRICULA  " . $matricula, $titleColor);
	imagestring($image, 5, 170, 263, "DT NASCIMENTO " . $dtnacimento, $titleColor);

	header("Content-type: image/png");

	imagepng($image);
	imagepng($imageCart);

	imagedestroy($image);
	imagedestroy($imageCart);

}

//Para imagens jpg
function wpi_gera_carteira_jpg($nomeCompleto, $matricula, $cpf, $perfil, $dtnacimento, $validade) {

//Imagem de fundo
	$image = imagecreatefromjpeg((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/wp-content/uploads/cart1.jpg");

//Image da carteirinha perfil
	$imageCart = imagecreatefromjpeg($perfil);

	$titleColor = imagecolorallocate($image, 255, 255, 255);
	$gray = imagecolorallocate($image, 100, 100, 100);
	$black = imagecolorallocate($image, 0, 0, 0);

	imagecopymerge($image, $imageCart, /*Horizontal*/60, /*Vertical*/177, 0, 0, imagesx($imageCart), imagesy($imageCart), 100);

	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/175, "NOME  " . strtoupper($nomeCompleto), $titleColor);
	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/205, "CPF  " . $cpf, $titleColor);
	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/235, "MATRICULA  " . $matricula, $titleColor);
	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/263, "DT NASCIMENTO " . $dtnacimento, $titleColor);
//	imagestring($image, 2, /*Horizontal*/5, /*Vertical*/350, "VALIDO ATE " . $validade, $black);

	header("Content-type: image/jpeg");

	imagejpeg($image);
	imagejpeg($imageCart);

	imagedestroy($image);
	imagedestroy($imageCart);

}

//Para imagens jpeg
function wpi_gera_carteira_jpeg($nomeCompleto, $matricula, $cpf, $perfil, $dtnacimento, $validade) {

//Imagem de fundo
	$image = imagecreatefromjpeg((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/wp-content/uploads/cart1.jpeg");

//Image da carteirinha perfil
	$imageCart = imagecreatefromjpeg($perfil);

	$titleColor = imagecolorallocate($image, 255, 255, 255);
	$gray = imagecolorallocate($image, 100, 100, 100);
	$black = imagecolorallocate($image, 0, 0, 0);

	imagecopymerge($image, $imageCart, /*Horizontal*/60, /*Vertical*/177, 0, 0, imagesx($imageCart), imagesy($imageCart), 100);

	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/175, "NOME  " . strtoupper($nomeCompleto), $titleColor);
	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/205, "CPF  " . $cpf, $titleColor);
	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/235, "MATRICULA  " . $matricula, $titleColor);
	imagestring($image, 5, /*Horizontal*/170, /*Vertical*/263, "DT NASCIMENTO " . $dtnacimento, $titleColor);
//	imagestring($image, 2, /*Horizontal*/5, /*Vertical*/350, "VALIDO ATE " . $validade, $black);

	header("Content-type: image/jpeg");

	imagejpeg($image);
	imagejpeg($imageCart);

	imagedestroy($image);
	imagedestroy($imageCart);

}

//------------------------------------------------
function wpi_select_cart() {

	/*$nomeCompleto = $_GET['nome'];
	$matricula = $_GET['matricula'];
	$cpf = $_GET['cpf'];
	$perfil = $_GET['perfil'];
	$dtnacimento = $_GET['dtnacimento'];
	$validade = $_GET['validade'];
	$tipoPhoto = $_GET['tipo'];

	

	if ($tipoPhoto == 'png' || $tipoPhoto == 'PNG') {
		wpi_gera_carteira_png($nomeCompleto, $matricula, $cpf, $perfil, $dtnacimento, $validade);
	}

	if ($tipoPhoto == 'jpg' || $tipoPhoto == 'JPG') {
		wpi_gera_carteira_jpg($nomeCompleto, $matricula, $cpf, $perfil, $dtnacimento, $validade);
	}

	if ($tipoPhoto == 'jpeg' || $tipoPhoto == 'JPEG') {
		wpi_gera_carteira_jpeg($nomeCompleto, $matricula, $cpf, $perfil, $dtnacimento, $validade);
	}*/

	

wpi_testing_gd();

}

wpi_select_cart();


//============== TESTING =====================
function wpi_testing_gd (){

echo "string";

}

?>

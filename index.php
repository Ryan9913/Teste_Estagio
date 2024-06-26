
<html>

<!-- 1 erro - o elemento <head> deve estar dentro de um <head> e não diretamente do <html>
2 erro - erro de digitação na linha 18 `$cp` deveria ser `$cep`
3 erro - erro de digitação na linha 21 $addres->logradoro deveria ser $address->logradoro
4 erro - erro na linha 30 $url = "http://viacep.com.br/ws$cep/xml/"; faltou uma barra apos o xspassando a ser $url = "http://viacep.com.br/ws/$cep/xml/";
5 erro - erro de digitação na linha 23 $adress->uf deveria ser $address->uf
6 erro - tag <form> não foi fechada no HTML
7 erro - erro de digitação na linha 16 estava idex.php e deveriaser index.php	-->

	<head>
	<title> MEU CEP </title>
	</head>
	<body> 
		<form action="index.php" method="post">
		<label> Insira o CEP: </label>
		<input type="text" name="cep">
		<input type="submit" value="Enviar">


<?php
//criação da classe Address
class Address{
public function get_address($cep){
	
	
	$cep = preg_replace("/[^0-9]/", "", $cep);
	$url = "http://viacep.com.br/ws/$cep/xml/";

	$xml = simplexml_load_file($url);
	return $xml;
}
}
if(!empty($_POST['cep'])){
	$cep = $_POST['cep'];

//criação da instância 	
$addressOBJ = new Address();

$address = $addressOBJ->get_address($cep);

	echo "<br><br>CEP Informado: $cep<br>";
	echo "Rua: $address->logradouro<br>";
	echo "Bairro: $address->bairro<br>";
	echo "Estado: $address->uf<br>";
}



?>
</form>
	</body>
</html>
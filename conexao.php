<?php
/* 
* @PerlissonArtur
* @EstudanteWeb
* @Facebook: https://www.facebook.com/perlisson.artur.332
*
*
*
*
*/
function  conectar(){
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=login", "root", "33541155");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	return $pdo;
} 


?>


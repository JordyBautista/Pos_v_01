<?php  
 class ConexionBD{

static public function Conecction(){

		$link = new PDO("mysql:host=localhost;dbname=practica",
			            "root",
			            "");
		$link->exec("set names utf8");

		return $link;

	}


 }
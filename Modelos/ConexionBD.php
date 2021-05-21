<?php  
 class ConexionBD{

static public function Conecction(){

		$link = new PDO("mysql:host=localhost:3306;dbname=practica",
			            "root",
			            "1234");
		$link->exec("set names utf8");

		return $link;

	}


 }
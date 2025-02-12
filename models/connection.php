<?php

class Connection{
	public function connect(){
		$link = new PDO("mysql:host=localhost;dbname=gis", "root", "");

		// $link = new PDO("mysql:host=localhost;dbname=u342130502_gis", "u342130502_gis", "MOJ@2024_onwards");

		$link -> exec("set names utf8");
		return $link;
	}
}
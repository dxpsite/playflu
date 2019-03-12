<?php
try
{
	$bdd = new PDO('mysqli:host=p:mariadb;dbname=dbase;charset=utf8', 'subty', 'letmein!play0ut');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

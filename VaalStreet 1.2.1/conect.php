<?php
try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=vaalstreet', 'root', '');
//echo 'conected to the server<br/>';
}catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
//echo 'Not conected to the server<br/>';
}
?>
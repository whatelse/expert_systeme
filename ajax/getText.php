<?php
require_once("autoload.php");

$id=intval($_POST['id']);
$result=Db::querySingle("select libelle from facts where id=$id");
if (isset($result->libelle)
	echo $result->libelle;
else
	echo 0;

<?php
require_once("../autoload.php");

$resultat = Db::querySingle('SELECT fait FROM fait WHERE id='.$_POST['id']);

echo $resultat->fait;
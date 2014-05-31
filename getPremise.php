<?php
require_once("autoload.php");

$id=intval($_POST['id']);
$result=Db::querySingle("select question from arbre where id=$id");
if (isset($result->question)
	echo $result->question;
else
	echo 0;

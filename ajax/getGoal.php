<?php
require_once("autoload.php");

$id=intval($_POST['id']);
$result=Db::querySingle("select goal from goal where id=$id");
if (isset($result->goal)
	echo $result->goal;
else
	echo 0;

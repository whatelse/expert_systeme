<?php
require_once("autoload.php");

$text="[";
$results=Db::queryObject("select id,s1,s2 from arbre order by id");
foreach($results as $result)
{
	$text.='{goal: '.$result->id.', premise1: '.$result->s1.', premise2: '.$result->s2.'},';
}
$text.="]";

echo $text;

<?php
require_once("../autoload.php");

$text = "[";
$results = Db::queryObject("SELECT id, faits_precedents FROM regle");
foreach($results as $result)
{
	$text .= '{"idBut" : '.$result->id.', "faits_precedents" : [';
	$faits = explode(",", $result->faits_precedents);
	foreach($faits as $idFait)
	{
		$text .= $idFait.',';
	}

	$text=substr($text, 0, -1);
	$text.=']},';
}
$text=substr($text, 0, -1);
$text.="]";

echo $text;

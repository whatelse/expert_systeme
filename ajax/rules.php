<?php
require_once("../autoload.php");

$text="[";
$results=Db::queryObject("select goal,facts from rules order by id");
foreach($results as $result)
{
	$resultGoal=Db::querySingle("select libelle from fact where id=$result->goal");	
	$text.='{id: '.$result->goal.', goal: '.$resultGoal->libelle.', facts: [';

	$factExplode=explode(",", $result->facts);
	foreach($factExplode as $id)
	{
		$resultFacts=Db::querySingle("select libelle from fact where id=$id");
		 $text.='{id: '.$id.', text: "'.$resultFacts->libelle.'"},';
	}

	$text=substr($text, 0, -1);
	$text.=']},';
}
$text=substr($text, 0, -1);
$text.="]";

echo $text;

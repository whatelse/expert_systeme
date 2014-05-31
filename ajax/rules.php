<?php
require_once("autoload.php");

$text="[";
$results=Db::queryObject("select goal,facts from rules order by id");
foreach($results as $result)
{
	$text.='{goal: '.$result->goal.', facts: '.$result->facts.'},';
}
$text.="]";

echo $text;

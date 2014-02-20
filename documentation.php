<?php
	require_once('model/db.php');

	function afficherInfos($ereg){
		/*
		if($ereg->pre != 0){
			$prec = explode(';', $ereg->pre);
			foreach ($prec as $pr) {
				if($pr != 0){
					$precedent = Db::querySingle('SELECT question from arbre WHERE id='.$pr);
					echo '<td>p - '.$precedent->question.' ?</td>';
				}
			}
		}else echo "<td></td>";
		*/
		echo '<td>'.$ereg->id.'</td>';
		echo '<td>'.$ereg->question.' ?</td>';
		if($ereg->s1 != 0){
			$suivant = Db::querySingle('SELECT question from arbre WHERE id='.$ereg->s1);
			echo '<td>'.$suivant->question.' ?</td>';
		}else echo '<td><span class="glyphicon glyphicon-ok"></span> <span style="color:green;">On a une solution !</span></td>'; 
		if($ereg->s2 != 0){
			$suivant = Db::querySingle('SELECT question from arbre WHERE id='.$ereg->s2);
			echo '<td>'.$suivant->question.' ?</td>';
		}else echo '<td><span class="glyphicon glyphicon-ok"></span> <span style="color:green;">On a une solution !</span></td>'; 
	}

	function getDoc(){
		$enregistrements = Db::queryObject('SELECT * FROM arbre');
		echo '<tr><th>No</th><th>Question</th><th>Non</th><th>Oui</th></tr>';
		foreach ($enregistrements as $enregistrement) {
			echo '<tr>';
			afficherInfos($enregistrement);
			echo '</tr>';
		}
	}
?>

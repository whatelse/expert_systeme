<?php
	function afficherBdc(){
		echo '<thead><tr><th>Numero</th><th>Libelle</th></thead><tbody>';
		$enregistrements = Db::queryObject('SELECT id, fait FROM fait');
		foreach ($enregistrements as $enregistrement) {
			echo '<tr>';
			echo '<td>'.$enregistrement->id.'</td>';
			echo '<td>'.$enregistrement->fait.'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
	}
	
	function afficherDoc(){		
		echo '<thead><tr><th>No</th><th>Question</th><th>Non</th><th>Oui</th></tr></thead><tbody>';
		$enregistrements = Db::queryObject('SELECT * FROM arbre');
		foreach ($enregistrements as $enregistrement) {
			echo '<tr>';
			afficherInfos($enregistrement);
			echo '</tr>';
		}
		echo '</tbody>';
	}

	function afficherInfos($ereg){
		echo '<td>'.$ereg->id.'</td>';
		echo '<td>'.$ereg->question.' ?</td>';
		afficherSuivant($ereg->s1);
		afficherSuivant($ereg->s2);
	}
	
	function afficherSuivant($next){
		if($next != 0){
			$suivant = Db::querySingle('SELECT question from arbre WHERE id='.$next);
			echo '<td>'.$suivant->question.' ?</td>';
		}else echo '<td><span class="glyphicon glyphicon-ok"></span> <span style="color:green;">On a une solution !</span></td>'; 
	}
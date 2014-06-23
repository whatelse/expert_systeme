<?php
	function afficherFaits(){
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
	
	function afficherQuestions(){
		echo '<thead><tr><th>Numero</th><th>Libelle</th></thead><tbody>';
		$enregistrements = Db::queryObject('SELECT id, but FROM regle WHERE faits_suivants <> \'\' GROUP BY but');
		foreach ($enregistrements as $enregistrement) {
			echo '<tr>';
			echo '<td>'.$enregistrement->id.'</td>';
			echo '<td>'.$enregistrement->but.'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
	}
	
	function afficherLangages(){
		echo '<thead><tr><th>Numero</th><th>Libelle</th></thead><tbody>';
		$enregistrements = Db::queryObject('SELECT id, but FROM regle WHERE faits_suivants = \'\' GROUP BY but');
		foreach ($enregistrements as $enregistrement) {
			echo '<tr>';
			echo '<td>'.$enregistrement->id.'</td>';
			echo '<td>'.$enregistrement->but.'</td>';
			echo '</tr>';
		}
		echo '</tbody>';
	}

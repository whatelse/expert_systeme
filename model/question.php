<?php
	class QuestionModel {
		function getAllQuestion() {
			$var = Db::queryArray("SELECT * FROM question");
		}

		function getQuestion($id) {
			$var = Db::querySingle("SELECT pre, s1, s2, question FROM arbre WHERE id = $id");
		}
	}
?>
<?php
    require_once('autoload.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Projet IA second semestre.</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
    	<div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <h1> Projet concernant la création d'un système expert</h1>
                        <h4><u> Etudiant participant au projet : </u></h4>
                        <p>
                            <ul>
                            <li> Romain DAUBY (chef de projet) </li>
                            <li> Thomas LORENZATO </li>
                            <li> Loïc MERCIER </li>
                            <li> Vincent FADDA </li>
                            <li> Pierrick NANOT </li>
                            <li> Félix WATTEZ </li>
                            </ul>
                        </p>
                        </h4>
                    </div>
                    <div class="row">
                        <h2>Base de connaissance</h2>
                    </div>
                    <div class="row">
                        <h3>Liste des faits</h3><hr>
                        <table id="faits" class="table table-striped table-bordered table-hover">
                        <?=afficherFaits()?>
                        </table>
                    </div>
                    <div class="row">
                        <h3>Liste des questions</h3><hr>
                        <table id="questions" class="table table-striped table-bordered table-hover">
                        <?=afficherQuestions()?>
                        </table>
                    </div>
                </div>
            </div>
    	</div>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/lib/jquery.dataTables.min.js"></script>
    <script src="js/lib/datatables.bootstrap.js"></script>    
	<script>
	    $(document).ready(function(){
            $('#faits').dataTable();
            $('#questions').dataTable();
	    });
	</script>
    </body>
</html>

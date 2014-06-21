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
                    <h2>Base de connaissance</h2>
                    <h3>Liste des faits</h3><hr>
                    <table id="res" class="table table-striped table-bordered table-hover">
                    <?=afficherBdc()?>
                    <table>
                </div>
            </div>
    	</div>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/lib/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready(function(){
            $('#res').dataTable();
	    });
	</script>
    </body>
</html>

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
                    <h1>Langage de développement</h1>
                </div>
            </div>
    	</div>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/expert_system/engine.js"></script>
        <script src="js/expert_system/expert_system.js"></script>
        <script src="js/expert_system/fact.js"></script>
        <script src="js/expert_system/rule.js"></script>
        <script>
            var expertSystem = new ExpertSystem();
            
            function initialiserSystemeExpert(data){
                for(var i = 0; i < data.length; i++){
                    expertSystem.addRule(data[i].idBut, data[i].faits_precedents);
                }
            }
            
            $(document).ready(function(){
                $.ajax({
                    url : 'ajax/getRules.php'
                }).done(function(response){
                    initialiserSystemeExpert(JSON.parse(response));
                });
            });
        </script>
    </body>
</html>

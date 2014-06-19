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
                    <div id="question"></div>
                    <div id="faits">                        
                    </div>
                    <input type="text" id="valeur">
                    <button class="btn" id="submit">Envoyer</button>
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
            var used = [];
            
            function initialiserSystemeExpert(data){
                for(var i = 0; i < data.length; i++){
                    expertSystem.addRule(data[i].idBut, data[i].faits_precedents);
                }
            }
            
            function afficherLeBut(idBut){
                //console.log(idBut);
                $.ajax({
                    url : 'ajax/getBut.php',
                    type : 'POST',
                    data : 'idBut='+idBut
                }).done(function(response){
                    var data = JSON.parse(response);
                    $('#question').html(data.but);
                    $('#faits').html("");
                    for(var i = 0; i < data.faits_suivants_libelle.length; i++){
                        /*var input = '<input type="radio" name="faits" value="' + data.faits_suivants_libelle[i].id + '" id="' + data.faits_suivants_libelle[i].id + '" />';
                        input += '<label for="' + data.faits_suivants_libelle[i].id + '">' + data.faits_suivants_libelle[i].libelle + '</label><br />';
                        */
                        used.push(data.id);
                        var input = data.faits_suivants_libelle[i].id + ' - '+ data.faits_suivants_libelle[i].libelle + '<br>';
                        $('#faits').append(input);
                    }
                });
            }                    
            
            function notUsed(tab){
                var present = false;
                for(var j = 0; j < tab.length; j++){
                    var present = false;
                    for(var i = 0; i < used.length; i++){                    
                        if(used[i] == tab[j])
                            present = true;                            
                    }
                    if(!present)
                        return tab[j];
                }
                return 0;
            }
            
            $('#submit').click(function() {
                expertSystem.setFactValid($('#valeur').val(), true);                    
                var id = notUsed(expertSystem.inferForward());
                afficherLeBut(id);
            });
            
            $(document).ready(function(){
                $.ajax({
                    url : 'ajax/getRegles.php'
                }).done(function(response){
                    initialiserSystemeExpert(JSON.parse(response));
                });
                
                var idBut = '';
                afficherLeBut(idBut);
            });
        </script>
    </body>
</html>

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
                    <ol id="faitsChoisis" class="breadcrumb"></ol>
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
            var listeQuestionRepondue = [];
            var listeDeFaitChoisi = [];
            var input = $('#valeur');
            var faits = $('#faits');

            function notInListeQuestionRepondue(tab){
                var present = false;
                for(var j = 0; j < tab.length; j++){
                    var present = false;
                    for(var i = 0; i < listeQuestionRepondue.length; i++){                    
                        if(listeQuestionRepondue[i] == tab[j])
                            present = true;                            
                    }
                    if(!present)
                        return tab[j];
                }
                return 0;
            }
            
            function afficherFaitsChoisis(data){                
                var div = $('#faitsChoisis');
                div.html('');
                for(var i = 0; i < listeDeFaitChoisi.length; i++){
                    div.append('<li>' + listeDeFaitChoisi[i] + '</li>');
                }
            }
            
            function obtenirFaitParIdentifiant(id, callback){
                $.ajax({
                    url : 'ajax/getFait.php',
                    type : 'POST',
                    data : 'id='+id
                }).done(function(response){
                    callback(response);                    
                });
            }
            
            function ajouterLeFait(dom){
                obtenirFaitParIdentifiant(dom.val(), function(data){
                    listeDeFaitChoisi.push(data);
                    afficherFaitsChoisis(data);                    
                });
                expertSystem.setFactValid(dom.val(), true);
                initialiserInput(dom);
            }
            
            function envoyerLeFait(dom){
                ajouterLeFait(dom);
                afficherLeBut(notInListeQuestionRepondue(expertSystem.inferForward()));
            }
            
            function appuiToucheEntree(event){
                return event.which == 13;
            }
            
            $('#submit').click(function() {
                envoyerLeFait(input);
            });
            
            input.keypress(function( event ) {
                if (appuiToucheEntree(event)) {
                   envoyerLeFait($(this));
                }
            });
            
            function afficherLeBut(idBut){
                $.ajax({
                    url : 'ajax/getBut.php',
                    type : 'POST',
                    data : 'idBut='+idBut
                }).done(function(response){
                    var data = JSON.parse(response);
                    $('#question').html(data.but);
                    faits.html('');
                    if(data.faits_suivants_libelle){
                        for(var i = 0; i < data.faits_suivants_libelle.length; i++){
                            listeQuestionRepondue.push(data.id);                        
                            faits.append(data.faits_suivants_libelle[i].id + ' - '+ data.faits_suivants_libelle[i].libelle + '<br>');
                        }
                    }
                });
            }
            
            function initialiserInput(dom){
                dom.val('');
                dom.focus();
            }
            
            function initialiserSystemeExpert(){
                $.ajax({
                    url : 'ajax/getRegles.php'
                }).done(function(response){
                    var data = JSON.parse(response);
                    for(var i = 0; i < data.length; i++){
                        expertSystem.addRule(data[i].idBut, data[i].faits_precedents);
                    }
                });
            }
            
            $(document).ready(function(){            
                initialiserSystemeExpert();
                initialiserInput(input);
                afficherLeBut('');
            });
        </script>
    </body>
</html>

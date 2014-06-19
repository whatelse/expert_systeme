<?php
require_once("../autoload.php");

$resultat = array();
if(empty($_POST['idBut'])){
    $resultat = Db::querySingleArray('SELECT id, but, faits_suivants FROM regle WHERE faits_precedents=\'\'');
}else{
    $idBut = intval($_POST['idBut']);
    $resultat = Db::querySingleArray('SELECT id, but, faits_suivants FROM regle WHERE id='.$idBut);
}

if(empty($resultat['faits_suivants'])){
    $resultat['goal'] = true;
}else{
    $faits = explode(',', $resultat['faits_suivants']);
    foreach($faits as $idFait){
        $res = Db::querySingle('SELECT fait FROM fait WHERE id='.$idFait);
        $resultat['faits_suivants_libelle'][] = array('id'=>$idFait, 'libelle'=>$res->fait);
    }
}

echo json_encode($resultat);
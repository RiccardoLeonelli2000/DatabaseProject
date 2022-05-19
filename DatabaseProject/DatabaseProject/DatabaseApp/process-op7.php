<?php
    require_once "bootstrap.php";

    
    $data = strval(date("Y-m-d"));
    $oraInizio = strval(date("H:i:s"));
    
    

    if ($dbh->trovaMacchinario($_POST["Targa"]) == false || $dbh->trovaOperaio($_POST["Matricola"]) == false || $dbh->occupazione(intval($_POST["Matricola"]), $_POST["Targa"]) == true){
        $msg.="Dati inesistenti";
    }
    else{
        $res = $dbh->aggiungiProduzione(intval($_POST["Matricola"]), $oraInizio, $data, $_POST["Targa"]);
        var_dump($res);
        if($res != false){
            $msg.="Accesso in produzione registrato correttamente";
        }
        else{
            $msg.="Accesso già eseguito";
        }
    }
    header("location: op7.php?formmsg=".$msg);
    
?>
<?php
    require_once "bootstrap.php";

    
    var_dump($_POST);
    $data=date("Y-m-d");
    $data=strval($data);
    echo($data);
    
    if ($dbh->trovaOrdine(intval($_POST["NumeroOrdine"])) == false || $dbh->trovaCamionista(intval($_POST["Matricola"])) == false){
        $msg.="Dati inesistenti";
    }
    else{
        $res = $dbh->aggiungiSpedizione(intval($_POST["NumeroOrdine"]), $data, intval($_POST["Matricola"]));
        
        if($res != false){
            $dbh->modificaStatoOrdine(intval($_POST["NumeroOrdine"]), "consegnato");
            $msg.="Spedizione aggiunta con successo";
        }
        else{
            $msg.="Spedizione già effettuata";
        }
    }
    header("location: op3.php?formmsg=".$msg);
    
?>
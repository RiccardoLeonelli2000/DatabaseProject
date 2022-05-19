<?php
    require_once "bootstrap.php";

    
    $data=date("Y-m-d");
    $data=strval($data);
    
    $cliente=$dbh->trovaCliente($_POST["Nome"]);
    if ($cliente == false){
        $msg.="Cliente inesistente";
    }
    else{
        $res = $dbh->aggiungiOrdine(intval($_POST["NumeroOrdine"]), $cliente[0]["PartitaIva"], $data, $_POST["Descrizione"], $_POST["Stato"]);
        
        if($res != false){
            $msg.="Ordine aggiunto con successo";
        }
        else{
            $msg.="Ordine già esistente";
        }
    }
    header("location: op2.php?formmsg=".$msg);
    
?>
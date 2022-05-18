<?php
    require_once "bootstrap.php";

    
    $data = strval(date("Y-m-d"));
    $ora = strval(date("H:i:s"));
    $lottoLavorazione=$_POST["LottoLavorazione"];
    $targa=$_POST["Targa"];
    $lottoProdotto=$_POST["LottoProdotto"];
    $tipo=$_POST["Tipo"];
    $descrizione=$_POST["Descrizione"];

    var_dump($lottoLavorazione, $ora, $data, $lottoProdotto, $targa, $tipo, $descrizione);
    
    if ($dbh->trovaProdotto($lottoProdotto == false)){
        $msg.="lotto non trovato aggiungere nuovo prodotto qui";
        header("location: op8-2.php?formmsg=".$msg);
    }
    if ($dbh->trovaMacchinario($targa) == false){
        $msg.="Macchinario Inesistente";
    }
    else{
        $res = $dbh->aggiungiLavorazione($lottoLavorazione, $ora, $data, $lottoProdotto, $targa, $tipo, $descrizione);
        var_dump($res);
        if($res != false){
            $msg.="Lavorazone registrata con successo";
        }
        else{
            $msg.="Lotto già esistente";
        }
    }
    header("location: op8.php?formmsg=".$msg);
    
?>
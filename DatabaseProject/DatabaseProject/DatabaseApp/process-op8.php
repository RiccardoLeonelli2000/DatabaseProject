<?php
    require_once "bootstrap.php";

    
    $data = strval(date("Y-m-d"));
    $ora = strval(date("H:i:s"));
    $lottoLavorazione=$_POST["LottoLavorazione"];
    $targa=$_POST["Targa"];
    $lottoProdotto=$_POST["LottoProdotto"];
    $tipo=$_POST["Tipo"];
    $descrizione=$_POST["Descrizione"];
    $quantita=intval($_POST["Quantità"]);
    $lottoMateriale=$_POST["LottoMateriale"];

    var_dump($lottoLavorazione, $ora, $data, $lottoProdotto, $targa, $tipo, $descrizione, $quantita, $lottoMateriale);
    var_dump($dbh->verificaQuantità($lottoMateriale, $quantita));
    if ($dbh->trovaProdotto($lottoProdotto == false)){
        $msg.="lotto non trovato aggiungere nuovo prodotto qui";
        header("location: op8-2.php?formmsg=".$msg);
    }
    else if ($dbh->trovaMacchinario($targa) == false){
        $msg.="Macchinario Inesistente";
    }
    else if ($dbh->verificaQuantità($lottoMateriale, $quantita) == [] && isSet($_POST["LottoMateriale"]) && !empty($_POST["LottoMateriale"])){
        $msg.="Quantità materie prime insufficente o materiale non trovato";
    }
    else{
        $res = $dbh->aggiungiLavorazione($lottoLavorazione, $ora, $data, $lottoProdotto, $targa, $tipo, $descrizione);
        $res1 = true;
        if (isSet($_POST["LottoMateriale"]) && !empty($_POST["LottoMateriale"])){
            $res1 = $dbh->aggiungiNecessita($lottoLavorazione, $lottoMateriale, $quantita);
            $dbh->aggiornaMateriale($lottoMateriale, $quantita);
        }
        var_dump($res);
        if($res && $res1 != false){
            $msg.="Lavorazone registrata con successo";
        }
        else{
            $msg.="Lotto già esistente o materiali insufficenti";
        }
    }
    header("location: op8.php?formmsg=".$msg);
    
?>
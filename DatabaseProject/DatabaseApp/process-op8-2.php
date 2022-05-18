<?php
    require_once "bootstrap.php";

    $lottoProdotto=$_POST["LottoProdotto"];
    $tipo=$_POST["Tipo"];
    $pesoComplessivo=intval($_POST["PesoComplessivo"]);
    $pesoPerElemento=intval($_POST["PesoPerElemento"]);
    $numeroElementi=intval($_POST["NumeroElementi"]);
    
    if ($_POST["Lunghezza"]==''){
        $lunghezza = null;
    }
    else{
        $lunghezza=intval($_POST["Lunghezza"]);
    }
    if ($dbh->trovaOrdine(intval($_POST["NumeroOrdine"])) == false && $_POST["NumeroOrdine"]!=''){
        $msg.="Ordine inesistente";
    }
    else{
        $numeroOrdine=intval($_POST["NumeroOrdine"]);
        $res = $dbh->aggiungiProdotto($lottoProdotto, $tipo, $pesoComplessivo, $pesoPerElemento, $numeroElementi, $lunghezza, $numeroOrdine);
        var_dump($res);
        if($res != false){
            $msg.="Prodotto con lotto: ".$lottoProdotto." aggiunto con successo";
        }
        else{
            $msg.="Prodotto già esistente";
        }
    }
    header("location: op8.php?formmsg=".$msg);
    
?>
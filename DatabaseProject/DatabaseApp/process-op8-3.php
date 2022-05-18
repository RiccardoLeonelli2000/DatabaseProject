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
    if ($dbh->trovaProdotto($lottoProdotto) == false){
        $msg.="Prodotto inesistente";
    }
    else{
        $res = $dbh->aggiornaProdotto($lottoProdotto, $tipo, $pesoComplessivo, $pesoPerElemento, $numeroElementi, $lunghezza);
        var_dump($res);
        if($res != false){
            $msg.="Prodotto con lotto: ".$lottoProdotto." modificato con successo";
        }
        else{
            $msg.="Prodotto errato";
            header("location: op8-3.php?formmsg=".$msg);
        }
    }
    header("location: op8.php?formmsg=".$msg);
    
?>
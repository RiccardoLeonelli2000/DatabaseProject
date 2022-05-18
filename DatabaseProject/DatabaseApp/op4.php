<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op4Page";
    $templateParams["pagereq"] = "template/op4Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    if (!isset($_POST["dataInizio"]) || !isset($_POST["dataFine"])){
        $templateParams["Ordini"] = null;
    }
    else{
        $dataInizio=$_POST["dataInizio"];
        $dataFine=$_POST["dataFine"];
        if ($dbh->trovaOrdiniConsegnati($dataInizio,$dataFine) == false){
            $msg.="Nessun ordine trovato";
            header("location: op4.php?formmsg=".$msg);
        } 
        $templateParams["Ordini"] = $dbh->trovaOrdiniConsegnati($dataInizio,$dataFine);
    }

    require 'template/base.php';
?>
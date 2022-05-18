<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op10Page";
    $templateParams["pagereq"] = "template/op10Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    if (!isset($_POST["LottoProdotto"])){
        $templateParams["Lavorazioni"] = [];
    }
    else{
        $lottoProdotto=$_POST["LottoProdotto"];
        if ($dbh->trovaProdotto($lottoProdotto) == false){
            $msg.="Dati inesistente";
            header("location: op10.php?formmsg=".$msg);
        }
        else{
        $lottoProdotto=$_POST["LottoProdotto"];
        $templateParams["Lavorazioni"] = $dbh->trovaProduzioniOperai($lottoProdotto);
        }
    }

    require 'template/base.php';
?>
<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op5Page";
    $templateParams["pagereq"] = "template/op5Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    if (!isset($_POST["LottoProdotto"])){
        $templateParams["Prodotti"] = [];
    }
    else{
        $lottoProdotto=$_POST["LottoProdotto"];
        if ($dbh->trovaProdotto($lottoProdotto) == false){
            $msg.="Prodotto inesistente";
            header("location: op5.php?formmsg=".$msg);
        }
        else{
        $lottoProdotto=$_POST["LottoProdotto"];
        $templateParams["Prodotti"] = $dbh->trovaProdotto($lottoProdotto);
        }

    }

    require 'template/base.php';
?>
<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op9Page";
    $templateParams["pagereq"] = "template/op9Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    if (!isset($_POST["Nome"])){
        $templateParams["Lavorazioni"] = [];
    }
    else{
        $nome=$_POST["Nome"];
        if ($dbh->trovaLavorazioniCliente($nome) == false){
            $msg.="Dati inesistente";
            header("location: op9.php?formmsg=".$msg);
        }
        else{
        $nome=$_POST["Nome"];
        $templateParams["Lavorazioni"] = $dbh->trovaLavorazioniCliente($nome);
        }

    }

    require 'template/base.php';
?>
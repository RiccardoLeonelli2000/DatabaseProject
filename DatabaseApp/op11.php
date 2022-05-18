<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op11Page";
    $templateParams["pagereq"] = "template/op11Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    if (!isset($_POST["anno"])){
        $templateParams["costo"] = [];
    }
    else{
        $anno=intval($_POST["anno"]);
        if ($dbh->costoMateriali($anno) == false){
            $msg.="Nessun dato trovato";
            header("location: op11.php?formmsg=".$msg);
        }
        else{
            $anno=intval($_POST["anno"]);
            $templateParams["costo"] = $dbh->costoMateriali($anno);
        }
    }

    require 'template/base.php';
?>
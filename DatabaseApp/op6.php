<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op6Page";
    $templateParams["pagereq"] = "template/op6Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    if (!isset($_POST["anno"])){

    }
    else{
        $anno=intval($_POST["anno"]);
        if ($dbh->calcolaFatturato($anno)[0]["SUM(CostoTotale)"] == null){
            $msg.="Dati errati";
            header("location: op6.php?formmsg=".$msg);
        }
        else{
        $templateParams["fatturato"] = $dbh->calcolaFatturato($anno);
        }

    }

    require 'template/base.php';
?>
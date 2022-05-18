<?php
    require_once "bootstrap.php";

    
    var_dump($_POST);

    $res = $dbh->aggiungiCliente($_POST["PartitaIva"], $_POST["Nome"],$_POST["Telefono"], $_POST["Città"], $_POST["Via"], $_POST["NumeroCivico"]);

    if($res == true){
        $msg.="Cliente aggiunto con successo";
    }
    else{
        $msg.="Cliente già esistente";
    }

    header("location: op1.php?formmsg=".$msg);
    
?>
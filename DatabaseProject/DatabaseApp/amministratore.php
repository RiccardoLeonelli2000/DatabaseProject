<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "AmministratorePage";
    $templateParams["pagereq"] = "template/amministratoreTemplate.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");


    require 'template/base.php';
?>
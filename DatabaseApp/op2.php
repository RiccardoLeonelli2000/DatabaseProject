<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op2Page";
    $templateParams["pagereq"] = "template/op2Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");


    require 'template/base.php';
?>
<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op1Page";
    $templateParams["pagereq"] = "template/op1Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    require 'template/base.php';
?>
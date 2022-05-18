<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op8-3Page";
    $templateParams["pagereq"] = "template/op8-3Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    require 'template/base.php';
?>
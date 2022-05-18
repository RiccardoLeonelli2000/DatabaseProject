<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op3Page";
    $templateParams["pagereq"] = "template/op3Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    require 'template/base.php';
?>
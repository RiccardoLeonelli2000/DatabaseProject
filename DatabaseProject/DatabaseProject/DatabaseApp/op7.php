<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op7Page";
    $templateParams["pagereq"] = "template/op7Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    require 'template/base.php';
?>
<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "op8Page";
    $templateParams["pagereq"] = "template/op8Template.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");

    require 'template/base.php';
?>
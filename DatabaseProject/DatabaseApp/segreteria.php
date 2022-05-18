<?php
    require_once "bootstrap.php";

    //Base Template
    $templateParams["titolo"] = "UfficioQualitàPage";
    $templateParams["pagereq"] = "template/segreteriaTemplate.php";
    $templateParams["css"] = array("css/header.css", "css/footer.css");


    require 'template/base.php';
?>
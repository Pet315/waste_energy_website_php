<?php

    require "header.php";
    $page = htmlspecialchars(strip_tags(addslashes($_GET['page'])));

    if (!$page) {
        include "pages/index.php";
    } else {
        require 'pages/'.$page.'.php';
    }

    require "footer.php";
?>

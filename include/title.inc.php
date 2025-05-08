<?php

    $title = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
    $page_title = str_replace("-", " ", ucfirst(basename($title)));

?>
<?php
    if ( isset( $_SESSION['login'] ) )
        require('views/header_author.phtml');
    else
        require('views/header.phtml');

?>
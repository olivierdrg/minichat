<?php

    $manager = new MessageManager( $link );
    $messages = $manager->findAll();

    require("views/messages.phtml");
    
    
?>

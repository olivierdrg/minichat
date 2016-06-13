<?php
    $manager = new AuthorManager( $link );
    $authors = $manager->findAllPresence();

    require("views/users.phtml");
?>
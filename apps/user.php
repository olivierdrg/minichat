<?php
    $i = 0;
    $count = count( $authors );

    while ( $i < $count ) {
        $author = $authors[$i];
        
        require("views/user.phtml");

        $i++;
    }  
?>
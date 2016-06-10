<?php
    $i = 0;
    $count = count( $messages );

    while ( $i < $count ) {
        $message = $messages[$i];
        
        require('views/message.phtml');

        $i++;
    }  
?>
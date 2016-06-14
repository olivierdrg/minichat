<?php
if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'ajout') {

        $message_manager = new MessageManager( $link );
        $author_manager = new AuthorManager( $link );
        try {
            $message = $message_manager->create( $_POST );
            $author = $author_manager->findById( $_SESSION['id'] );

            $author_manager->updatePresence( $author );

            header('Location: index.php?page=chat');
            exit;
        }

        catch ( Exception $exception ){
            $error = $exception->getMessage();
        }
    }
     
}
?>
<?php

//  if ( !isset( $_SESSION['login'] ) ) return; 

if ( isset( $_POST['action'] ) ) {

    if ($_POST['action'] == 'register') {

        $manager = new AuthorManager( $link );// $link => $this->link
        try {
            $author = $manager->create( $_POST );

            header('Location: index.php?page=login');
            exit;
        }

        catch ( Exception $exception ){
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'login' ) {
        $manager = new AuthorManager( $link );// $link => $this->link
        try {
            $author = $manager->login( $_POST );

            header('Location: index.php?page=chat');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

}




if ( isset( $_GET['page'] ) && $_GET['page']  == 'logout' ) {
    session_destroy();

    header('Location: index.php?page=login');
    exit;
}

?>
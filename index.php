<?php    
    session_start();
    require('config.php');
    require('apps/functions.php');

    function __autoload( $className ) {
        require('models/' . $className . '.class.php' );
    }

    $link = mysqli_connect( $serveur ,$username, $password, $database);
    if ( !$link ) {
        require('views/bigerror.phtml');
        exit;
    }

    define( 'LIB', 'public/' );
    define( 'IMAGE_PATH', LIB . 'images/' );
    define( 'CSS_PATH', LIB . 'css/' );
    define( 'JS_PATH', LIB . 'js/' );
    define( 'STAR', '' ); // fontawesome fa-star 
    

    $page = 'categories';
    $error = '';

    $access = array(
        'chat',
    );

    $access_traitement = array(      
        'chat'                     => 'chat',
    );

    if ( isset( $_GET['page'] ) ) {
        if ( in_array( $_GET['page'], $access ) ) {
            $page = $_GET['page'];
        }
    }

    if ( isset( $access_traitement[$page] ) ) {
        require('apps/traitement_' . $access_traitement[$page] . '.php' );
    }

    if ( isset( $_GET['ajax'] ) ) {
        $accessAjax = ['panier'];
        $pageAjax = 'panier';
        require('apps/'.$pageAjax.'.php');
    } else
        require('apps/skel.php');

?>
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
   

    $page = 'login';
    $error = '';

    $access = array(
        'chat',
        'login',
        'logout',
        'register',        
    );

    $access_traitement = array(      
        'chat'                      => 'message',
        'login'                     => 'author',
        'logout'                    => 'author',
        'register'                  => 'author',        
    );

    if ( isset( $_GET['page'] ) ) {
        if ( in_array( $_GET['page'], $access ) ) {
            $page = $_GET['page'];
        }
    }

    if ( isset( $access_traitement[$page] ) ) {
        require('apps/traitement_' . $access_traitement[$page] . '.php' );
    }

    // if ( isset( $_GET['ajax'] ) ) {
    //     $accessAjax = ['panier'];
    //     $pageAjax = 'panier';
    //     require('apps/'.$pageAjax.'.php');
    // } else
        require('apps/skel.php');

?>
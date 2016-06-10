<?php
/**
* @file : Author.class.php // PascalCase
*
*/
class Author {
    // Déclaration des propriétés privées.
    private $id;
    private $login;
    private $pseudo;
    private $password;

    private $link;// propriété extérieure != DB

    //...

    public function __construct($link)
    {
        $this->link = $link;
    }


    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }    

    public function getPseudo() {
        return $this->pseudo;
    }


    public function getPassword() {
        return $this->password;
    }


    public function setLogin( $login ) {
        if ( strlen( $login ) < 3 ) 
            throw new Exception ("Login trop court (< 3)");
        else if ( strlen( $login ) > 63 )
            throw new Exception ("Login trop long (> 63)");            

        $this->login = $login;
    }

    public function setPseudo( $pseudo ) {
        if ( strlen( $pseudo ) < 3 ) 
            throw new Exception ("Pseudo trop court (< 3)");
        else if ( strlen( $pseudo ) > 63 )
            throw new Exception ("Pseudo trop long (> 63)");            

        $this->pseudo = $pseudo;
    }


    public function setPassword( $password ) {
        if ( strlen( $password ) < 3 ) 
            throw new Exception ("Mot de passe trop court (< 3)");
        else if ( strlen( $password ) > 63 )
            throw new Exception ("Mot de passe trop long (> 63)");            

        $this->password = $password;
    }


    
}

?>
<?php


class AuthorManager {
    private $link;

    // Liste des fonctions magiques en php : http://php.net/manual/fr/language.oop5.magic.php
    public function __construct( $link ) {
        $this->link = $link;
    }



    public function findAll() {
        $list = [];
        $request = "SELECT * FROM author";
        $res = mysqli_query( $this->link, $request );
        while ($author = mysqli_fetch_object( $res, "Author" , [$this->link]) )
            $list[] = $author;
        return $list;
    }

    public function findAllPresence() {
        $date = date('Y-m-d h:i:s', mktime( date('h'), date('i') - 1, date('s'), date('m'), date('d'), date('Y') ) );
        $list = [];
        $request = "SELECT * FROM author WHERE date > " . $date;
        $res = mysqli_query( $this->link, $request );
        while ($author = mysqli_fetch_object( $res, "Author" , [$this->link]) )
            $list[] = $author;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM author WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $author = mysqli_fetch_object( $res, "Author" , [$this->link]);
        return $author;
    }  

    public function create( $data ) {

        $author = new Author( $this->link );

        if ( !isset( $data['login'] ) ) throw new Exception ("Login manquant");
        if ( !isset( $data['pseudo'] ) ) throw new Exception ("Pseudo manquant");
        if ( !isset( $data['password'] ) ) throw new Exception ("Mot de passe manquant");
        if ( !isset( $data['confirme_password'] ) ) throw new Exception ("Mot de passe manquant");

                         
    
        if ( $data['password'] !=  $data['confirme_password'] ) throw new Exception ("Mot de passe incorrect");
        

        $author->setPseudo( $data['pseudo'] );
        $author->setLogin( $data['login'] );
        $author->setPassword( password_hash( $data['password'], PASSWORD_BCRYPT, array( 'cost' => 8 ) ) );
        
        // $id = $author->getId();

        $pseudo            = mysqli_real_escape_string( $this->link, $author->getPseudo() );
        $login             = mysqli_real_escape_string( $this->link, $author->getLogin() );
        $password          = $author->getPassword();

        

        $request = "INSERT INTO author ( pseudo, login, password ) 
            VALUES('" . $pseudo . "', '" . $login . "', '" . $password . "')";

        $res = mysqli_query( $this->link, $request );
        

        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            
            // si c'est bon id > 0
            if ( $id ) {
                $author = $this->findById( $id );

                return $author;    
            }
            else// Sinon
                throw new Exception ("Internal server error0");                
        }
        else// Sinon
            throw new Exception ("Internal server error1");
                
    }    

    public function remove(author $author ) {
        $id = $author->getId();

        if ( $id ) {// true si > 0
        
            $request = "DELETE FROM author WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $author; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }  

    public function login( $data ) {  
        $author = new Author($this->link);

        
        if ( !isset( $data['password'] ) ) throw new Exception ("Mot de passe manquant");
        if ( !isset( $data['login'] ) ) throw new Exception ("Login manquant");                 
    
        $password = $data['password'];
        $login     = $data['login'];

        $request = 'SELECT * FROM author WHERE login="' . $login . '" LIMIT 1';

        $res = mysqli_query( $this->link, $request ); 
         
        $ligne = mysqli_fetch_assoc( $res );

        if ( password_verify( $password, $ligne['password']) ) {
            $_SESSION['id'] = $ligne['id'];
            $_SESSION['login'] = $ligne['login'];
            $_SESSION['pseudo'] = $ligne['pseudo'];
        }
    }

    public function updatePresence( Author $author ) { // type-hinting
        $id = $author->getId();

        if ( $id ) {

            $request = "UPDATE author SET  date=CURRENT_TIMESTAMP WHERE id=" . $id;

            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }

}
?>

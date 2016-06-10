<?php
/**
* @file : Message.class.php
*
*/
class Message {

    private $id;
    private $id_author;
    private $date;
    private $content;

    private $author;
    private $link;

    public function __construct( $link ) {
        $this->link = $link;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdAuthor() {
        return $this->id_author;
    }

    public function getAuthor() {
        $manager = new AuthorManager( $this->link );
        $this->author = $manager->findById( $this->id_author );

        return $this->author;
    }

    public function getDate() {
        return $this->date;
    }

    public function getContent() {
        return $this->content;
    }

    public function setPseudo( $pseudo ) {
        $this->pseudo = $pseudo;
    }

     public function setContent( $content ) {
        $this->content = $content;
    }  
    
}

?>
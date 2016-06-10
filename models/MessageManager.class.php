<?php
/**
* @file : MessageManager.class.php
*
*/
class MessageManager {

    private $link;

    public function __construct( $link ) {
        $this->link = $link;
    }


    public function findAll() {

        //print_r(get_declared_classes());
        $list = [];
        $request = 'SELECT * FROM message';
        $res = mysqli_query( $this->link, $request );
        while ( $message = mysqli_fetch_object( $res, 'Message', array( $this->link ) ) )
            $list[] = $message;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = 'SELECT * FROM message WHERE id = ' . $id;
        $res = mysqli_query( $this->link, $request );
        $message = mysqli_fetch_object( $res, 'Message', array( $this->link ) );
        return $message;
    }


    public function create( $data ) {

        $message = new Message( $this->link );

        if ( !isset( $data['content'] ) ) throw new Exception ("contenu manquant");

        $message->setContent( $data['content'] );

        $id_author  = $_SESSION['id'];
        $content    = mysqli_real_escape_string( $this->link, $message->getContent() );

        $request = "INSERT INTO message (id_author, content )
            VALUES('" . $id_author . "', '" . $content . "')";

        $res = mysqli_query( $this->link, $request );

        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );

            // si c'est bon id > 0
            if ( $id ) {
                $message = $this->findById( $id );
                return $message;
            }
            else// Sinon
                throw new Exception ("Internal server error");
        }
        else// Sinon
            throw new Exception ("Internal server error");

    }


}
?>

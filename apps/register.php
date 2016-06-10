<?php
    $pseudo            = '';
    $login             = '';
    $password          = '';
    $confirme_password = '';

    if ( isset( $_POST['pseudo'] ) ) $pseudo = $_POST['pseudo'];
    if ( isset( $_POST['login'] ) ) $login = $_POST['login'];
    if ( isset( $_POST['password'] ) ) $password = $_POST['password']; 
    if ( isset( $_POST['confirme_password'] ) ) $confirme_password = $_POST['confirme_password'];

    require('views/register.phtml');
?>
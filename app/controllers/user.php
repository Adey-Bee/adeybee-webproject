<?php

class user {
    var $f3, $db;

    function __construct() {
        $this->f3 = \Base::instance();
    }

    function loadContent( $page, $variables = array() ) {
        global $twig;

        if ( file_exists( $this->f3->get( 'UI' ).$page ) ) {
            echo $twig->render( $page, $variables );
        } else {
            $this->f3->error( 404 );
        }
    }

    function here() {
        $this->loadContent("form.twig");
    }
}
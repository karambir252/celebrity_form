<?php
    function isLoggedIn(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            return TRUE;
        }
        return FALSE;
    }
    
    function endsWith( $str, $sub ) {
        return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
    }
?>
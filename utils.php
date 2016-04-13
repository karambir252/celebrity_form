<?php
    function isLoggedIn(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            return TRUE;
        }
        return FALSE;
    }
?>
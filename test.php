<?php
    
    require_once('dbhelper.php');

    
    $db = new SQLiteDb();

    //$db->addArrival(12345,7,'Good to see you i miss you again');
    $db->addQuestion('How are you doing?',1,7);
    
    $db->close();
?>
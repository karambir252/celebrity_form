<?php
    session_start();

    $date = $_POST['arrival_date'];
    $message = $_POST['message'];

    echo 'Your response is submitted: <br />';
    echo $date . '<br />';
    echo $message . '<br />';
?>
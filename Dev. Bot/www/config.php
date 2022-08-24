<?php
    $host = 'web.ctf.devcore.tw';
    session_start();
    if(!isset($_SESSION['uuid'])){
        $uuid = md5('devcore' . $_SERVER['REMOTE_ADDR']. random_bytes(10));
        $_SESSION['uuid'] = $uuid; 
    }else{
        $uuid = $_SESSION['uuid'];
    }
    $sandbox = '/var/www/upload/sandbox/' . $uuid;
    @mkdir($sandbox);
?>

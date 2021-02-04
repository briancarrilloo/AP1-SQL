<?php
    function SQLConnect(){
        $dbhost = "localhost";
        $dbuser = "mvmservice";
        $dbpass = "12345";
        $db = "MVM";
    
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Error en la connexión %s\n". $conn -> error);

        return $conn;
    }
    function SQLDisconnect($conn){
        $conn -> close();
    }
?>
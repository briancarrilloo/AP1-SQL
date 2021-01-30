<?php
    include '../check-session.php';
    if(CheckSession(3)){
        header( 'Location: ../session-expired.php' );
    }

    include 'db.php';
    $id = $_GET['id'];

    //Eliminar registro de la base de datos
    $conn = SQLConnect();

    $sql = "DELETE FROM `Vacant` WHERE `Vacant`.`id-vacant` = $id";
    $conn->query($sql);

    SQLDisconnect($conn);
    
    //Volver a la página de vacantes
    header( 'Location: ./panel-company.php' );
?>
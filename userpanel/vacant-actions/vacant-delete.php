<?php
    include '../../check-session.php';
    if(CheckSession(3)){
        header( 'Location: ../../session-expired.php' );
    }

    include '../../db.php';
    $id = $_GET['id'];

    //Eliminar registro de la base de datos
    $conn = SQLConnect();

    $sql = "DELETE FROM `Vacant` WHERE `Vacant`.`id-vacant` = $id";
    $conn->query($sql);

    SQLDisconnect($conn);

    //Comprobar archivo y crear con cabecera
    if(!(file_exists('../../logs/LogVacantes.txt'))){
        $myFile = fopen("../../logs/LogVacantes.txt", "a") or die ("El archivo no se ha podido crear.");
        fwrite($myFile, "- - - Registro de eventos de vacantes - - -\n");
        fclose($myFile);
    }

    //Añadir entrada log
    $line = "La empresa " . $_SESSION['company'] . ", ha eliminado la vacante " . $_GET['id'] . ' ' . date("d-m-Y H:i:s") . "\n";
    $myFile = fopen("../../logs/LogVacantes.txt", "a") or die ("El archivo no se ha podido abrir.");
    fwrite($myFile, $line);
    fclose($myFile);
    
    //Volver a la página de vacantes
    header( 'Location: ../panel-company.php' );
?>
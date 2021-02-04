<?php
    session_start();
    $id = $_GET['id'];

    //Comprobar archivo y crear con cabecera
    if(!(file_exists('../../logs/RegistroVacantes.txt'))){
        $myFile = fopen("../../logs/RegistroVacantes.txt", "a") or die ("El archivo no se ha podido crear.");
        fwrite($myFile, "- - - Participantes registrados en las vacantes - - -\n");
        fclose($myFile);
    }

    //Añadir registros
    $line = "El usuario " . $_SESSION['user'] . ", se ha registrado candidato para la vacante " . $_GET['id'] . "\n";
    
    $myFile = fopen("../../logs/RegistroVacantes.txt", "a") or die ("El archivo no se ha podido abrir.");
    fwrite($myFile, $line);
    fclose($myFile);


?>
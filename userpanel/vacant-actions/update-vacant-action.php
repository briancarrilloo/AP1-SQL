<?php
        // Preparación                        
        include '../../db.php';
        session_start();

        $id = $_SESSION['vacant'];
        $title = $_POST['title'];
        $desctrab = $_POST['desctrab'];
        $descpuesto = $_POST['descpuesto'];
        $dual = $_POST['dual'];
    
        //Conexión SQL
        $conn = SQLConnect();
    
        $sql = "UPDATE `Vacant` SET `title`='$title',`descrip-job`='$desctrab',`descrip-vacant`='$descpuesto',`fpdual`='$dual' WHERE `id-vacant`=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('La vacante se ha publicado con éxito.');</script>";
        } else {
            echo "<script type='text/javascript'>alert('No se ha podido crear la vacante.');</script>";
        }

        //Comprobar archivo y crear con cabecera
        if(!(file_exists('../../logs/LogVacantes.txt'))){
            $myFile = fopen("../../logs/LogVacantes.txt", "a") or die ("El archivo no se ha podido crear.");
            fwrite($myFile, "- - - Registro de eventos de vacantes - - -\n");
            fclose($myFile);
        }

        //Añadir entrada log
        $line = "La empresa " . $_SESSION['company'] . ", ha modificado la vacante " . $id . "\n";
        $myFile = fopen("../../logs/LogVacantes.txt", "a") or die ("El archivo no se ha podido abrir.");
        fwrite($myFile, $line);
        fclose($myFile);
    
    //Volver a la página de vacantes
    header( 'Location: ../panel-company.php' );
    
        header("Location: ../panel-company.php");
        SQLDisconnect($conn);
?>
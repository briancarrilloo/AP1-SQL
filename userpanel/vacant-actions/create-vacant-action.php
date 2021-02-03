<?php
    // Preparación                        
    include '../../db.php';
    session_start();

    $title = $_POST['title'];
    $desctrab = $_POST['desctrab'];
    $descpuesto = $_POST['descpuesto'];
    $dual = $_POST['dual'];

    //Conexión SQL
    $conn = SQLConnect();

    $sql = "insert into Vacant values(DEFAULT, '" . $_SESSION["company"] . "',' $title', '$desctrab', '$descpuesto', $dual);";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('La vacante se ha publicado con éxito.');</script>";
    } else {
        echo "<script type='text/javascript'>alert('No se ha podido crear la vacante.');</script>";
    }

    header("Location: ../panel-company.php");
    SQLDisconnect($conn);

    //Comprobar archivo y crear con cabecera
    if(!(file_exists('../../logs/LogVacantes.txt'))){
        $myFile = fopen("../../logs/LogVacantes.txt", "a") or die ("El archivo no se ha podido crear.");
        fwrite($myFile, "- - - Registro de eventos de vacantes - - -\n");
        fclose($myFile);
    }

    //Añadir entrada log
    $line = "La empresa " . $_SESSION['company'] . ", ha creado una vacante: " . $_POST['title'] . "\n";
    $myFile = fopen("../../logs/LogVacantes.txt", "a") or die ("El archivo no se ha podido abrir.");
    fwrite($myFile, $line);
    fclose($myFile);
?>
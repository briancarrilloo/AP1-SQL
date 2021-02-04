<?php
    session_start();
    $id = $_GET['id'];

    //Comprobar archivo y crear con cabecera
    if(!(file_exists('../../logs/RegistroVacantes.txt'))){
        $myFile = fopen("../../logs/RegistroVacantes.txt", "a") or die ("El archivo no se ha podido crear.");
        fwrite($myFile, "- - - Participantes registrados en las vacantes - - -\n");
        fclose($myFile);
    }

    // Añadir registros
    $line = "El usuario " . $_SESSION['user'] . ", se ha registrado candidato para la vacante " . $_GET['id'] . ' ' . date("d-m-Y H:i:s") . "\n";
    
    $myFile = fopen("../../logs/RegistroVacantes.txt", "a") or die ("El archivo no se ha podido abrir.");
    fwrite($myFile, $line);
    fclose($myFile);

    //Mostrar alerta de registro correcto
    echo '<script language="javascript">alert("Te has registrado para la vacante");</script>';
    switch($_SESSION['role']){
        case 1:
            echo "<script>document.location = '../panel-alumn.php'</script>";
            break;
        case 2:
            echo "<script>document.location = '../panel-exalumn.php'</script>";
            break;
    }
?>
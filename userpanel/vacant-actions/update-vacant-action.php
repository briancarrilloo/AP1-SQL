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
    
        header("Location: ../panel-company.php");
        SQLDisconnect($conn);
?>
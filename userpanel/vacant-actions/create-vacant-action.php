<?php
    // Preparación                        
    include 'db.php';
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

    header("Location: ./panel-company.php");
    SQLDisconnect($conn);
?>
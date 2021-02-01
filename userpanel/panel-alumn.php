<!DOCTYPE html>
<html lang="es">

<?php
    include '../check-session.php';
    if(CheckSession(1)){
        header( 'Location: ../session-expired.php' );
    }
?>

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="../css/panel.css">
</head>

<body>
    <header>
        <img class="logo" src="../img/logo.png" alt="Logo">
        <h1>Bienvenido alumno</h1>
    </header>

    <main>
        <div class="content">
            <?php
                // Conexión                        
                include '../db.php';
                // session_start();

                //Comprobar si existen vacantes
                $conn = SQLConnect();
                $sql = "select * from Vacant;";
                if ($response = $conn->query($sql)) {
                    if ($response->num_rows){
                        //Existen vacantes
                        echo "<h2>Ofertas disponibles:</h2>";

                        //Cabecera de la tabla
                        echo "<table>
                        <tr>
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Dual</th>
                            <th>Acciones</th>
                        </tr>";

                        // Recorrer respuesta SQL
                        while ($vacant = mysqli_fetch_array($response)){
                            //Traducir de Dual 0/1 a Si, No
                            if ($vacant['fpdual'] == 0){
                                $vacant['fpdual'] = 'No';
                            } else {
                                $vacant['fpdual'] = 'Si';
                            }

                            echo "<br>
                            <tr>
                                <td>" . $vacant['title'] . "</td>
                                <td>" . $vacant['company'] . "</td>
                                <td>" . $vacant['fpdual'] . "</td>
                                <td>
                                    <form>
                                        <a class='button' href='./vacant-actions/vacant-view-alumn.php?id=" . $vacant['id-vacant'] ."'>Ver</a>
                                        <a class='button' href='./vacant-actions/vacant-view-alumn.php?id=" . $vacant['id-vacant'] ."'>Optar</a>
                                    </form>
                                </td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        //No existen vacantes
                        echo "<h2>No existen vacantes</h2>";
                        echo "En estos momentos ninguna empresa tiene vacantes disponibles.";
                    }
                }
                SQLDisconnect($conn);
            ?>
            <br>
        </div>
    </main>

    <footer>
        <a class='closesession' href='../close-session.php'>Cerrar sesión</a>
    </footer>
</body>
</html>
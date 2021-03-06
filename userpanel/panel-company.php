<!DOCTYPE html>
<html lang="es">

<?php
    include '../check-session.php';
    if(CheckSession(3)){
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
        <?php
            echo "<h1>Bienvenida " . $_SESSION["company"] . "</h1>";
        ?>
    </header>

    <main>
        <div class="content">
            <?php
                // Conexión                        
                include '../db.php';

                //Comprobar si existen vacantes
                $conn = SQLConnect();
                $sql = "select * from Vacant where company = '" . $_SESSION["company"] . "';";
                if ($response = $conn->query($sql)) {
                    if ($response->num_rows){
                        //Existen vacantes
                        echo "<h2>Sus vacantes publicadas:</h2>";

                        //Cabecera de la tabla
                        echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Prácticas</th>
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
                                <td>" . $vacant['id-vacant'] . "</td>
                                <td>" . $vacant['title'] . "</td>
                                <td>" . $vacant['fpdual'] . "</td>
                                <td>
                                    <form>
                                        <a class='button' href='./vacant-actions/vacant-view-company.php?id=" . $vacant['id-vacant'] ."'>Ver</a>
                                        <a class='button' href='./vacant-actions/vacant-edit.php?id=" . $vacant['id-vacant'] ."'>Editar</a>
                                        <a class='button' href='./vacant-actions/vacant-delete.php?id=" . $vacant['id-vacant'] ."'>Eliminar</a>
                                    </form>
                                </td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        //No existen vacantes
                        echo "<h2>No existen vacantes</h2>";
                        echo "Esta empresa no ha creado ninguna vacante todavía. Pulse el botón para crear una.";
                    }
                }
                SQLDisconnect($conn);
            ?>
            <br>
            <form action="./vacant-actions/create-vacant.php">
                <button class="BigButton">Crear nueva vacante</button>
            </form>
        </div>
    </main>

    <footer>
        <a class='closesession' href='../close-session.php'>Cerrar sesión</a>
    </footer>
</body>
</html>
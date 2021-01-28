<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="../css/panel.css">
</head>

<body>
    <header>
        <img class="logo" src="../img/logo.png" alt="Logo">
        <h1>Bienvenida empresa</h1>
    </header>

    <main>
        <div class="content">
            <?php
                // Conexión                        
                include '../db.php';
                session_start();

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
                                <td>" . $vacant['id-vacant'] . "</td>
                                <td>" . $vacant['title'] . "</td>
                                <td>" . $vacant['fpdual'] . "</td>
                                <td>
                                    <form>
                                        <a href='./vacant-actions/vacant-view.php?id=" . $vacant['id-vacant'] ."'>Ver</a>
                                        <a href='./vacant-actions/vacant-edit.php?id=" . $vacant['id-vacant'] ."'>Editar</a>
                                        <a href='./vacant-actions/vacant-delete.php?id=" . $vacant['id-vacant'] ."'>Eliminar</a>
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
            <form action="vacant-actions/create-vacant.php">
                <button class="BigButton">Crear nueva vacante</button>
            </form>
        </div>
    </main>

    <footer>
        <p>Creado por Brian Carrillo</p>
    </footer>
</body>
</html>
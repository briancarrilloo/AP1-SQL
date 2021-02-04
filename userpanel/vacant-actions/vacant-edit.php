<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="../../css/panel.css">
</head>

<body>
    <header>
        <img class="logo" src="../../img/logo.png" alt="Logo">
        <h1>Editar la vacante</h1>
    </header>

    <main>
        <div class='content'>
            <h2>Detalles de la vacante:</h2>
            <?php
            include '../../db.php';
            $conn = SQLConnect();
            session_start();

            $id = $_GET['id'];
            $_SESSION['vacant'] = $id;
            
            $sql = "SELECT * FROM `Vacant` WHERE `id-vacant`=$id";
            $response = $conn->query($sql);
            $vacant = mysqli_fetch_array($response);

            echo "
                <form method='POST' action='update-vacant-action.php'>
                <div class='field'>
                    <p>Título: </p>
                    <textarea name='title' id='title' cols='60' rows='1'>" . $vacant['title'] . "</textarea>
                </div>
                <div class='field'>
                    <p>Descripción del trabajo: </p>
                    <textarea name='desctrab' id='desctrab' cols='60' rows='5'>" . $vacant['descrip-job'] . "</textarea>
                </div>
                <div class='field'>
                    <p>Descripción del puesto: </p>
                    <textarea name='descpuesto' id='descpuesto' cols='60' rows='7'>" . $vacant['descrip-vacant'] . "</textarea>
                </div>
                <p>Prácticas:</p>
                <select name='dual' id='dual'>
                        <option value=0>No</option>
                        <option value=1>Si</option>
                </select>
                <br>";

                echo "<button class='BigButton' type='submit'>Guardar cambios</button>";
                
                echo "</form>";

            echo "
            <br>
            <form action='../panel-company.php'>
                <button>Cancelar</button>
            </form>";
            ?>
        </div>
    </main>

    <footer>
        <a class='closesession' href='../close-session.php'>Cerrar sesión</a>
    </footer>
</body>
</html>
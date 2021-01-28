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
        <h1>Información de la vacante</h1>
    </header>

    <main>
        <div class='content'>
            <h2>Detalles de la vacante:</h2>
            <?php
            include '../../db.php';
            $conn = SQLConnect();
            session_start();

            $id = $_GET['id'];
            
            $sql = "SELECT * FROM `Vacant` WHERE `id-vacant`=$id";
            $response = $conn->query($sql);
            $vacant = mysqli_fetch_array($response);

            echo "
                <form method='POST'>
                <div class='field'>
                    <p>Título: </p>
                    <textarea name='title' id='title' cols='60' rows='1' readonly='yes'>" . $vacant['title'] . "</textarea>
                </div>
                <div class='field'>
                    <p>Descripción del trabajo: </p>
                    <textarea name='desctrab' id='desctrab' cols='60' rows='5' readonly='yes'>" . $vacant['descrip-job'] . "</textarea>
                </div>
                <div class='field'>
                    <p>Descripción del puesto: </p>
                    <textarea name='descpuesto' id='descpuesto' cols='60' rows='7' readonly='yes'>" . $vacant['descrip-vacant'] . "</textarea>
                </div>
                <div class='field'>
                    <p>FP Dual: </p>
                    <textarea name='dual' id='dual' cols='2' rows='1' readonly='yes'>" . $vacant['fpdual'] . "</textarea>
                </div>";

                echo "<button class='BigButton'>Optar a la vacante</button>";
                
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
        <p>Creado por Brian Carrillo</p>
    </footer>
</body>
</html>
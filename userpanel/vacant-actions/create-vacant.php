<!DOCTYPE html>
<html lang="es">

<?php
    include '../../check-session.php';
    if(CheckSession(3)){
        header( 'Location: ../../session-expired.php' );
    }
?>

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="../../css/panel.css">
</head>

<body>
    <header>
        <img class="logo" src="../../img/logo.png" alt="Logo">
        <h1>Crear una vacante</h1>
    </header>

    <main>
        <div class="content">
            <h2>Detalles de la vacante:</h2>

            <form action="create-vacant-action.php" method="POST">
                <div class="field">
                    <p>Título: </p>
                    <textarea name="title" id="title" cols="60" rows="1"></textarea>
                </div>
                <div class="field">
                    <p>Descripción del trabajo: </p>
                    <textarea name="desctrab" id="desctrab" cols="60" rows="5"></textarea>
                </div>
                <div class="field">
                    <p>Descripción del puesto: </p>
                    <textarea name="descpuesto" id="descpuesto" cols="60" rows="7"></textarea>
                </div>
                <div class="field">
                    <p>Prácticas: </p>
                    <select name="dual" id="dual">
                        <option value=0>No</option>
                        <option value=1>Si</option>
                    </select>
                </div>
                <button class="BigButton" type="submit">Crear vacante</button>
            </form>
            <br>
            <form action="../panel-company.php">
                <button>Cancelar</button>
            </form>
        </div>
    </main>

    <footer>
        <a class='closesession' href='../../close-session.php'>Cerrar sesión</a>
    </footer>
</body>
</html>
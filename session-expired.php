<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <img class="logo" src="img/logo.png" alt="Logo">
        <h1>La sesión ha expirado</h1>
    </header>
    <main>
        <div class="login">
            <h2>La sesión ha expirado</h2>
            <p>Vuelva a iniciar sesión para continuar utilizando el servicio.</p>
            <form action="index.html">
            <button type="back" value="back">Volver</button>
        </form>
        </div>
    </main>

    <footer>
        <p>Creado por Brian Carrillo</p>
    </footer>
</body>
</html>
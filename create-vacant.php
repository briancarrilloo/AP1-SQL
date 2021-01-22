<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="css/panel.css">
</head>

<body>
    <header>
        <img class="logo" src="img/logo.png" alt="Logo">
        <h1>Crear una vacante</h1>
    </header>

    <main>
        <div class="content">
            <h2>Detalles de la vacante:</h2>

            <form action="create-vacant-action.php" method="POST">
                <div class="field">
                    <p>Título: </p>
                    <input class="title" type="text" id="title" name="title" required />
                </div>
                <div class="field">
                    <p>Descripción del trabajo: </p>
                    <input class="BigForm" type="text" id="desctrab" name="desctrab" required />
                </div>
                <div class="field">
                    <p>Descripción del puesto: </p>
                    <input class="BigForm" type="text" id="descpuesto" name="descpuesto" required />
                </div>
                <div class="field">
                    <p>FP Dual: </p>
                    <select name="dual" id="dual">
                        <option value=0>No</option>
                        <option value=1>Si</option>
                    </select>
                </div>
                <button class="BigButton" type="submit">Crear vacante</button>
            </form>
            <br>
            <form action="panel-company.php">
                <button>Cancelar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>Creado por Brian Carrillo</p>
    </footer>
</body>
</html>
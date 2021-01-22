<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Manuel Vázquez Montalbán</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <script type="text/javascript" src="js/role.js"></script> -->
    <script type="text/javascript">
		function showDiv(div){
		if(div.value == 3){
			document.getElementById('companyfield').style.display = "block";
		} else{
			document.getElementById('companyfield').style.display = "none";
			}
		} 
	</script>    
</head>

<body>
    <header>
        <img class="logo" src="img/logo.png" alt="Logo">
        <h1>Formulario de registro</h1>
        
    </header>
    <main>
        <div class="register">
            <form action="registerform.php" method="POST">
                <p class="loginTitle">Introduzca los siguientes datos</p>
                <div>
                    <p>Rol:</p>
                    <select class="role" name="role" onchange="showDiv(this)">
                        <?php
                            // Conexión                        
                            include 'db.php';
                            $conn = SQLConnect();

                            // Selección de bd
                            $sql = "Use MVM;";
                            $conn->query($sql);
                            
                            // Consultar roles
                            $sql = "Select * from Roles;";
                            $result = mysqli_query($conn, $sql);

                            // Recorrer roles y imprimir resultados
                            while ($row = mysqli_fetch_array($result)){
                                echo $row[0];
                                echo "<option id='selectedrole' value='" . $row["roleid"] . "'>" . $row["name"] . "</option>";
                            }

                            // Desconexión
                            SQLDisconnect($conn);
                        ?>
                    </select>
                </div>
                <div class="loginfield" id="companyfield" style="display:none;">
                    <p>Empresa: </p>
                    <input type="text" id="company" name="company" />
                </div>
                <div class="loginfield">
                    <p>Nombre de usuario: </p>
                    <input type="text" id="user" name="user" required />
                </div>
                <div class="loginfield">
                    <p>Correo electrónico: </p>
                    <input type="text" id="email" name="email" required />
                </div>
                <div class="loginfield">
                    <p>Contraseña: </p>
                    <input type="password" id="password" name="password" required />
                </div>
                <div class="loginfield">
                    <p>Observaciones: </p>
                    <input type="text" id="observations" name="observations" placeholder="Opcional"/>
                </div>
                <button type="submit" value="submit">Registrarse</button>
                <button type="reset" value="Reset">Borrar</button>
                
            </form>
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
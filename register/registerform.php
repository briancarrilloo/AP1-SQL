<?php
    include '../db.php';

    $role = $_POST['role'];
    $company = $_POST['company'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $observations = $_POST['observations'];

    echo "registerform.php";

    //Comprobar si el usuario existe
    if (UserExists($user)) {
        //El usuario existe
        echo "El usuario $user ya existe.";
    } else {
        //No existe. Insertar usuario
        $sql = "insert into briancarrillo_mvm.Users values('$user', '$email', '$password', '$role', '$company', '$observations');";
        if (SQLExecute($sql)) {
            echo 'El usuario se ha creado correctamente.';
            header('Location: ../index.html');
        } else {
            echo 'No se ha podido crear el usuario';
        }
    }

    //Funciones
    function SQLExecute($sql)
    {
        $conn = SQLConnect();
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error en la consulta: " . $sql . "<br>" . $conn->error;
        }
        SQLDisconnect($conn);
    }

    function UserExists($user)
    {
        $conn = SQLConnect();
        $sql = "select * from briancarrillo_mvm.Users where username = '$user';";
        if ($resultado = $conn->query($sql)) {
            return $resultado->num_rows;
        }
        SQLDisconnect($conn);
    }

    function GoBack()
    {
        header('Location: ../index.html');
    }

    function Roles()
    {
        echo "Roles:";
        $sql = "Select * from Roles;";
        while ($row = mysqli_fetch_array($sql)) {
            echo "<option value='" . $row["roleid"] . "'>" . $row["name"] . "</option>";
        }
    }
?>
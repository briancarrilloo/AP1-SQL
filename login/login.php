<?php
    session_start();
    include '../db.php';
    $user = $_POST['user'];
    $password = $_POST['password'];

    $_SESSION["user"] = $user;
    $_SESSION["role"] = GetRole($user);

    if (CheckLogin($user, $password)){
        //Login success
        $roleid = GetRole($user);
        echo $roleid;

        switch ($roleid){
            case 1:
                //alumno
                header( 'Location: ../userpanel/panel-alumn.php' );
                break;
            case 2:
                //exalumno
                header( 'Location: ../userpanel/panel-exalumn.php' );
                break;
            case 3:
                //empresa
                $_SESSION["company"] = GetCompany($user);
                header( 'Location: ../userpanel/panel-company.php' );
                break;
        }

    } else{
        //Login failed
        header( 'Location: failed.html' );
    }

    //Funciones
    function GoRegisterPage(){
        header( 'Location: ../register/register.html' );
    }

    function CheckLogin($user, $password){
        $conn = SQLConnect();
        $sql = "select * from mvm.users where username = '$user' and password = '$password';";
        if ($resultado = $conn->query($sql)) {
            return $resultado->num_rows;
        }
        SQLDisconnect($conn);
    }

    function GetRole($user){
        $conn = SQLConnect();
        //Seleccionar rol
        $sql = "Select roleid from mvm.users where username = '$user';";
        $response = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($response);

        return $result['roleid'];
        SQLDisconnect($conn);
    }

    function GetCompany($user){
        $conn = SQLConnect();
        //Seleccionar empresa
        $sql = "Select company from mvm.users where username = '$user';";
        $response = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($response);

        return $result['company'];
        SQLDisconnect($conn);
    }
?>
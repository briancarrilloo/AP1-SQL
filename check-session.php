<?php
    function CheckSession($correctSession){
        session_start();
        //Comprobar que haya una sesión iniciada
        if(isset($_SESSION["role"])){
            if($_SESSION["role"] != $correctSession){
                //Rol incorrecto
                return 1;
            } else {
                //Sesión iniciada y rol correcto
                return 0;
            }
        } else {
            //Sesión no iniciada
            return 1;
        }
    }
?>
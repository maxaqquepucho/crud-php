<?php

    /**
     *
     */
    class Conectar
    {

        public  function conexion()
        {
            try {
                $conexion = new PDO('mysql:host=localhost; dbname=cursophp', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("SET CHARACTER SET utf8");
                
            } catch (Exception $e) {
                echo "Linea del error: ".$e->getLine()."<br>";
                die("Error :".$e->getMessage());
            }

            return $conexion;

        }
    }


 ?>

<?php

    /**
     *
     */
     require 'Conectar.php';

    class Usuario_modelo extends Conectar
    {


        private $conectado;
        private $usuarios;

        function __construct()
        {
            $this->conectado = Conectar::conexion();
            $this->usuarios= array();
        }


        public function mostrarUsuarios()
        {
            $consulta = $this->conectado->query("select A.*, B.* from persona as A inner join login as B on (A.codigo = B.usuario)");

            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                 $this->usuarios[] = $fila;
            }

            return $this->usuarios;
        }
        

        public function iniciarSesion($usuario, $pass)
        {
            $sql = "select A.*, B.* from persona as A
            inner join login as B on (A.codigo = B.usuario)
            where B.usuario = :usuario and B.pass = :pass";
            $consulta = $this->conectado->prepare($sql);

            $consulta->bindParam('usuario',$usuario, PDO::PARAM_STR);
            $consulta->bindParam('pass',$pass, PDO::PARAM_STR);
            $consulta->execute();

            $count = $consulta->rowCount();
            $dato = $consulta->fetch(PDO::FETCH_OBJ);

            if ($count) {
                // echo $dato->nombre;
                return true;
            }else {
                return false;

            }

        }

        public function registrar($usuario, $nombre, $apellido, $dni, $pass)
        {
            $sql1 = "insert into persona (codigo, nombre, apellido, dni)
                        values (:uno,:dos,:tres,:cuatro)";

            $consulta = $this->conectado->prepare($sql1);

            $consulta->bindParam('uno',$usuario, PDO::PARAM_STR);
            $consulta->bindParam('dos',$nombre, PDO::PARAM_STR);
            $consulta->bindParam('tres',$apellido, PDO::PARAM_STR);
            $consulta->bindParam('cuatro',$dni, PDO::PARAM_STR);
            $consulta->execute();

            $count = $consulta->rowCount();

            if ($count) {

                $sql2 = "insert into login (usuario, pass) values (:uno,:dos)";
                $consulta2 = $this->conectado->prepare($sql2);
                $consulta2->bindParam('uno',$usuario, PDO::PARAM_STR);
                $consulta2->bindParam('dos',$pass, PDO::PARAM_STR);
                $consulta2->execute();

                $count2 = $consulta2->rowCount();
                if ($count2) {
                    echo "bien";
                    return true;
                }else {
                    echo "mal";
                    return false;
                }

            } else {
                echo "mal";
                return false;
            }
        }

        public function eliminar($usuario)
        {
            $sql1 = "delete from login where usuario = :usuario ";
            $consulta1 = $this->conectado->prepare($sql1);
            $consulta1->bindParam('usuario', $usuario, PDO::PARAM_STR);
            $consulta1->execute();

            $count1 = $consulta1->rowCount();
            if ($count1) {
                $sql2 = "delete from persona where codigo = :usuario";
                $consulta2 = $this->conectado->prepare($sql2);
                $consulta2->bindParam('usuario', $usuario, PDO::PARAM_STR);
                $consulta2->execute();
                $count2 = $consulta2->rowCount();

                if ($count2) {
                    return true;
                } else {
                    return false;
                }

            }else {
                return false;
            }
        }

        public function buscarEditar($usuario)
        {
            $sql = "select A.*, B.* from persona as A
            inner join login as B on (A.codigo = B.usuario)
            where B.usuario = :usuario ";
            $consulta = $this->conectado->prepare($sql);
            $consulta->bindParam('usuario',$usuario, PDO::PARAM_STR);
            $consulta->execute();
            $count = $consulta->rowCount();
            $datos = $consulta->fetch(PDO::FETCH_OBJ);

            return $datos;
        }

        public function editar($usuario, $nombre, $apellido, $dni, $pass)
        {
            $sql1 = "update login set pass =:unoo where usuario =:doss;";

            $consulta1 = $this->conectado->prepare($sql1);
            $consulta1->bindParam('unoo',$pass, PDO::PARAM_STR);
            $consulta1->bindParam('doss',$usuario, PDO::PARAM_STR);
            $consulta1->execute();
            $count1 = $consulta1->rowCount();
            // $datos = $consulta->fetch(PDO::FETCH_OBJ);

            $sql2 = "update  persona set nombre=:uno, apellido=:dos, dni=:tres where codigo =:cuatro";
            $consulta2 = $this->conectado->prepare($sql2);
            $consulta2->bindParam('uno',$nombre, PDO::PARAM_STR);
            $consulta2->bindParam('dos',$apellido, PDO::PARAM_STR);
            $consulta2->bindParam('tres',$dni, PDO::PARAM_STR);
            $consulta2->bindParam('cuatro',$usuario, PDO::PARAM_STR);
            $consulta2->execute();
            $count2 = $consulta2->rowCount();





        }


    }


    // $a = new Usuario_modelo();
    //
    // $a->editar("daniel123","daniel","rojass","8857454","danyy");



 ?>

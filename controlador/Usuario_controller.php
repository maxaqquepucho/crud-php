<?php

    require_once('../modelo/Usuario_modelo.php');
    $user= new Usuario_modelo();
    $accion = $_GET["accion"];

    switch ($accion) {
        case 'iniciarSesion':
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            if ($user->iniciarSesion($usuario, $pass)) {
                header('location: ../controlador/Usuario_controller.php?accion=mostrar');
            }else {
                echo 'error';
            }
            break;

        case 'mostrar':
            $datosUser = $user->mostrarUsuarios();
             require_once('../vista/Usuarios_view.php');
             break;

        case 'registrar':
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $pass = $_POST['pass'];

            if ($user->registrar($usuario, $nombre, $apellido, $dni, $pass)) {
                header('location: ../controlador/Usuario_controller.php?accion=mostrar');
            }else {
                echo "no se puedo agregar";
            }
            break;

        case 'eliminar':
            $usuario = $_GET['usuario'];

            if ($user->eliminar($usuario)) {
                header('location: ../controlador/Usuario_controller.php?accion=mostrar');
            }else {
                echo "no se puede eliminar";
            }
            break;

        case 'buscarEditar':
            $usuario = $_GET['usuario'];

            $datosUser = $user->buscarEditar($usuario);
            require_once('../vista/Usuarios_editar.php');

            break;
        case 'editar':
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $pass = $_POST['pass'];

            $user->editar($usuario, $nombre, $apellido, $dni, $pass);
                header('location: ../controlador/Usuario_controller.php?accion=mostrar');
            break;
        default:
            echo "accion incorrecta";
            break;
    }


 ?>

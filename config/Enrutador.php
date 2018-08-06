<?php

    /**
     *
     */
    class Enrutador
    {

        
        public function cargarVista($vista)
        {

            switch ($vista) {
                case 'crear':
                    include_once('vista/'.$vista.'php');
                    break;
                case 'mostrar':
                    // code...
                    break;
                case 'eliminar':
                    // code...
                    break;

                default:
                    include_once('vista/Error.php');
                    break;
            }
        }
    }




 ?>

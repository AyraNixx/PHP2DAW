<?php
    class Utils
    {
        /**
         * Funcion que se conecta a la BD y nos devuelve una conexion PDO activa
         */
        public static function conectar()
        {
            //Importamos la configuración de flobal.php
            require_once('global.php');
            //El PDO a la hora de conectarse, permite que la conexion tenga ciertas 
            //propiedades(?)
            //Host la máquina donde tenemos la base de datos instalada
            //dbname, la base de datos
            //usuario
            //contraseña
            $conDB = null;
            try {
                $conDB = new PDO("mysql:host=".$DB_HOST.";dbname=$DB_SCHEMA", $DB_USER, $DB_PASSWD);
            } catch (PDOException $e) {
                print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
                return $conDB;
                die();
            }
            return $conDB;
            //Para cerrar la conexion, solo tenemos que ponerlo iguala nullo
            // $conDB = null;
        }
    }
?>
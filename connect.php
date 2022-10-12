<?php

    class conexion{
        //Conexion Local
        const server = 'localhost';
        const user = 'root';
        const pass = '';
        const bd = 'microservice';

        public function conectarDB(){

            $conectar = new mysqli(self::server,self::user,self::pass,self::bd);
            if($conectar -> connect_errno){
                die("Error Connecting to: ".$conectar -> connect_errno);
            }
            return $conectar;
        }
        
    }
?>
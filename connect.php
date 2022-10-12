<?php

    class conexion{
        //Conexion Local
        const server = 'localhost';
        const user = 'id18506050_root';
        const pass = '>e8T[ZpOYQAKY\E>';
        const bd = 'id18506050_microservice';

        public function conectarDB(){

            $conectar = new mysqli(self::server,self::user,self::pass,self::bd);
            if($conectar -> connect_errno){
                die("Error Connecting to: ".$conectar -> connect_errno);
            }
            return $conectar;
        }
        
    }
?>
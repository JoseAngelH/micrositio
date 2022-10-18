<?php
    function generaLlaves(){
        $configargs = array(
            "config" => "C:/xampp/php/extras/openssl/openssl.cnf", // Argumentos para generar las llaves
            'private_key_bits' => 2048,
            'default_md' => 'sha256',
        );
    
        $generar = openssl_pkey_new($configargs); // Creacion de las dos llaves
    
        openssl_pkey_export($generar, $keypriv, NULL, $configargs); // Exporta el contenido de la llave privada
    
        $keypub = openssl_pkey_get_details($generar); //Obtiene los detalles de la llave para generar la llave publica

        $llaves[0] = $keypub['key'];
        $llaves[1] = $keypriv;

        return $llaves;
    }
?>
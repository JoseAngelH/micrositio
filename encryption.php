<?php 

    // Algoritmo AES
    function cifradoAES($dato, $clave){
        $inivec = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC')); // Vector de inicializacion para generar cifrado
        $dato_encriptado = openssl_encrypt($dato, "AES-256-CBC", $clave, 0, $inivec); // Metodo para cifrar la informacion

        return base64_encode($dato_encriptado."::".$inivec); // Retornar el dato cifrado
    }

    function descifradoAES($dato, $clave){
        list($datos_encriptados, $inivec) = explode('::', base64_decode($dato),2);

        return openssl_decrypt($datos_encriptados, 'AES-256-CBC', $clave, 0, $inivec); // Metodo para descifrar la informacion
    }

    // Algoritmo RSA
    function cifradoRSA($dato, $Keypublica){
        openssl_public_encrypt($dato, $datos_cifrados, $Keypublica); // Metodo para cifrar los datos

        return base64_encode($datos_cifrados);
    }

    function descifradoRSA($dato, $Keyprivada){
        $datoC = base64_decode($dato);
        openssl_private_decrypt($datoC, $datos_descifrados, $Keyprivada); // Metodo para descifrar los datos

        return $datos_descifrados;

    }

?>
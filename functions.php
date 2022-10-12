<?php
    // Conexion a la Base de Datos
    require_once('connect.php');
    $cnn = new conexion();
    // Funciones para Cifrado Simetrico y Asimetrico
    include('encryption.php');
    include('asimetrico/llaves.php');
    // Procesos de insercion
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $amaterno = $_POST['AMaterno'];
    $apaterno = $_POST['APaterno'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $identificacion = $_POST['identificacion'];
    $contraseña = $_POST['contraseña'];
    $tipo = $_POST['tipo'];
    $cPublica = $_POST['clave'];

    if($tipo == 0){
        $direCif = cifradoAES($direccion, $cPublica);
        $identiCif = cifradoAES($identificacion, $cPublica);
        $pass = cifradoAES($contraseña, $cPublica);
        $query = "INSERT INTO `users`(`email`,`nombre`,`APaterno`,`AMaterno`,`telefono`,`direccion`,`identificacion`,`contraseña`,`type_encryption`, `cPublica`) 
                VALUES ('$email','$nombre','$apaterno','$amaterno','$telefono','$direCif','$identiCif','$pass','AES','$cPublica')";
        $insert = mysqli_query($cnn -> conectarDB(), $query);
        if($insert){
            echo "<script> 
                location.href='simetrico/simetrico.php';
            </script>";
        }
        else
            echo "ERROR: No Se Inserto En La BD";
    }
    if($tipo == 1){
        $llaves = generaLlaves();
        $llave_pub = $llaves[0];
        $llave_pri = $llaves[1];
        $direCif = cifradoRSA($direccion, $llave_pub);
        $identiCif = cifradoRSA($identificacion, $llave_pub);
        $pass = cifradoRSA($contraseña, $llave_pub);
        $query = "INSERT INTO `users`(`email`,`nombre`,`APaterno`,`AMaterno`,`telefono`,`direccion`,`identificacion`,`contraseña`,`type_encryption`,`cPublica`,`cPrivada`) 
                VALUES ('$email','$nombre','$apaterno','$amaterno','$telefono','$direCif','$identiCif','$pass','RSA','$llave_pub','$llave_pri')";
        $insert = mysqli_query($cnn -> conectarDB(), $query);
        if($insert){
            echo "<script> 
                location.href='asimetrico/asimetrico.php';
            </script>";
        }
        else
            echo "ERROR: No Se Inserto En La BD";
    }
?>
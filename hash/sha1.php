<?php
    require_once('../connect.php');
    $cnn = new conexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>MicroServicio</title>
</head>
<body>

    <!-- Pagina Principal -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../simetrico/simetrico.php">Cifrado Simetrico</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../asimetrico/asimetrico.php">cifrado Asimetrico</a>
        </li>
        <li>
            <select class="form-select" aria-label="Default select example" class="nav-link active" aria-current="page"
            style="border-color: transparent; color: #0D6EFD" onchange="location = this.value">
                <option selected>Hash</option>
                <option value='md5.php'">Hash v1 MD5</option>
                <option value="hash/sha1.php">Hash v2 SHA1</option>
            </select>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../propio/propio.php">cifrado Propio</a>
        </li>
    </ul>

    <br>
    <div class="container text-center">
        <div class="card" style="background-color: #D7D4D4;">
            <div class="card-header">
                <h2>Cifrado SHA1</h2>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">APaterno</th>
                            <th scope="col">AMaterno</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Clave Identificacion</th>
                            <th scope="col">Contraseña</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT*FROM users where type_encryption = 'SHA1';";
                        $select = mysqli_query($cnn->conectarDB(), $query);
                        foreach ($select as $dato) :
                        ?>
                            <tr>
                                <td> <?php echo $dato['email']; ?> </td>
                                <td> <?php echo $dato['nombre']; ?> </td>
                                <td> <?php echo $dato['AMaterno']; ?> </td>
                                <td> <?php echo $dato['APaterno']; ?> </td>
                                <td> <?php echo $dato['telefono']; ?> </td>
                                <td> <?php echo $dato['direccion']; ?> </td>
                                <td> <?php echo $dato['identificacion']; ?> </td>
                                <td> <?php echo $dato['contraseña']; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="adduser.php?tipo=3" class="btn btn-success">Nuevo</a>
            </div>
        </div>
    </div><br>

    <div class="container">
        <div class="card" style="background-color: #D7D4D4;">
            <div class="card-header">
                <h2>Buscar Usuario --> Cifrado SHA1</h2>
            </div>
            <form method="post">
                <div class="card-body">
                    <div class="mb-1">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="email" 
                        class="form-control" id="email" placeholder="Ingrese su correo electronico" name="email" required>
                    </div>
                    <div class="mb-1">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="password" 
                        class="form-control" id="contraseña" placeholder="Ingrese una contraseña" name="contraseña" required pattern="[A-Za-z0-9]{8-20}"
                        title="Minimo 8 caracteres, Mayusculas, Minusculas y Numeros">
                    </div>
                    <button type="submit" name="buscar" class="btn btn-success">Buscar</button>
                    
                </div>
            </form>
        </div>
    </div>
    <?php 
    if(isset($_POST['buscar'])){
        $correo = $_POST['email'];
        $passw = sha1($_POST['contraseña']);
        $query = "SELECT*FROM users where email = '$correo';";
        $select = mysqli_query($cnn->conectarDB(), $query);
        foreach ($select as $dato) :
            if($passw == $dato['contraseña']){
        ?>
            <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">APaterno</th>
                    <th scope="col">AMaterno</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Clave Identificacion</th>
                    <th scope="col">Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                ?>
                    <tr>
                        <td> <?php echo $dato['email']; ?> </td>
                        <td> <?php echo $dato['nombre']; ?> </td>
                        <td> <?php echo $dato['AMaterno']; ?> </td>
                        <td> <?php echo $dato['APaterno']; ?> </td>
                        <td> <?php echo $dato['telefono']; ?> </td>
                        <td> <?php echo $dato['direccion']; ?> </td>
                        <td> <?php echo $dato['identificacion']; ?> </td>
                        <td> <?php echo $dato['contraseña']; ?> </td>
                    </tr>
            </tbody>
        </table>
    <?php
        }else{
            echo "<h6> Contraseña Incorrecta </h6>";
        }
         endforeach; 
    }
     ?>
</body>
</html>
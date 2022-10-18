<?php 
    $tipo = $_GET['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Agregar Usuario</title>
</head>
<body>
    <div class="container">
        <div class="card" style="background-color: #D7D4D4;">
            <div class="card-header">
                <h2>Insertar Usuario --> Cifrado HASH</h2>
            </div>
            <form action="../functions.php" method="post">
                <div class="card-body">
                    <div class="mb-1">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="email" 
                        class="form-control" id="email" placeholder="Ingrese su correo electronico" name="email" required>
                    </div>
                    <div class="mb-1">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="text" 
                        class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" required">
                    </div>
                    <div class="mb-1">
                        <label for="AMaterno" class="form-label">Apellido Materno</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="text" 
                        class="form-control" id="AMaterno" placeholder="Ingrese su apellido" name="AMaterno" required>
                    </div>
                    <div class="mb-1">
                        <label for="APaterno" class="form-label">Apellido Paterno</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="text" 
                        class="form-control" id="APaterno" placeholder="Ingrese su apellido" name="APaterno" required>
                    </div>
                    <div class="mb-1">
                        <label for="telefono" class="form-label">Numero de telefono</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="number" 
                        class="form-control" id="telefono" placeholder="Ingrese su telefono" name="telefono" required pattern="[0-9]{10}">
                    </div>
                    <div class="mb-1">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="text" 
                        class="form-control" id="direccion" placeholder="Ingrese su direccion" name="direccion" required pattern="[A-Za-z]{10-100}">
                    </div>
                    <div class="mb-1">
                        <label for="identificacion" class="form-label">Identificacion</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="text" 
                        class="form-control" id="identificacion" placeholder="Ingrese los 13 digitos del reverso de la credencial" name="identificacion" required pattern="[A-Z0-9]{13}"
                        title="Minimo 13 caracteres">
                    </div>
                    <div class="mb-1">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input style="background-color: #D7D4D4; border-color:darkgrey" type="password" 
                        class="form-control" id="contraseña" placeholder="Ingrese una contraseña" name="contraseña" required pattern="[A-Za-z0-9]{8-20}"
                        title="Minimo 8 caracteres, Mayusculas, Minusculas y Numeros">
                    </div>
                    <input type="hidden" name="clave" id="clave" value='0'>
                    <?php if($tipo==2){ ?>
                        <input type="hidden" name="tipo" id="tipo" value='2'>
                    <?php }
                        else{ ?>
                        <input type="hidden" name="tipo" id="tipo" value='3'>
                    <?php } ?>
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <?php if($tipo==2){ ?>
                            <a href="md5.php" class="btn btn-danger">Cancelar</a>
                    <?php }
                        else{ ?>
                            <a href="sha1.php" class="btn btn-danger">Cancelar</a>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
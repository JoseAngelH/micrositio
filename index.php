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
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="simetrico/simetrico.php">Cifrado Simetrico</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="asimetrico/asimetrico.php">cifrado Asimetrico</a>
        </li>
        <li>
            <select class="form-select" aria-label="Default select example"
            style="border-color: transparent; color: #0D6EFD" onchange="location = this.value">
                <option selected>Hash</option>
                <option value='hash/md5.php'">Hash v1 MD5</option>
                <option value="hash/sha1.php">Hash v2 SHA1</option>
            </select>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="propio/propio.php">cifrado Propio</a>
        </li>
    </ul>
    <img src="portada.jpg" class="img-fluid" alt="Datos Del Alumno">
</body>
</html>
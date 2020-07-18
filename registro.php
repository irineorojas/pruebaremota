<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        a{
            text-decoration: none;
            font-size: 20px;
            
        }
    
    
    </style>
</head>
<body>
    
    
    <nav>
        <form action="registro.php" method="post">
        <div class="log">Registro</div>
        <input type="email" name="correo" placeholder="Ingrese su correo electrónico">
        <input type="password" name="password" placeholder="Ingrese su contraseña" minlength="5">
        <input type="submit" value="REGISTRAR" name="registrar">
        <br><br>
    </form>
    </nav>
    
    <?php 
    require_once 'conectar.php';

    if (isset($_POST['registrar'])) {
        $correo=$_POST['correo'];
        $password=md5($_POST['password']);

        $sql = "SELECT * FROM usuario WHERE correo='$correo'";
        $resultado=$conexion->query($sql);
        if ($resultado->num_rows>=1) {
            echo '<script> alert("El correo ya existe prueba con otro por favor!!")</script>';
        }
        elseif(empty($_POST['correo']) || empty($_POST['password'])) {
            echo '<script> alert("No se permite campos vacios")</script>';
        }else{
            $query="INSERT INTO usuario VALUES(NULL,'$correo', '$password')";
            $result=$conexion->query($query);
            if (!$result) {
                die('fallo el registro');
            }else{
                echo '<script> alert("Se inserto con exito")</script>';
            }
        }
    }   
               
?>
<br>
<h1>GRACIAS POR TU CONFIANZA</h1>
<h2>gracias</h2>

<a href="index.php">Desea regresar a login?</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  
    
    <nav>
        
        <form  action="index.php" method="post">
        <div class="log">Login</div>
        <input type="email" name="correo" placeholder="Correo electronico">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" value="INGRESAR">
        <br><br><br>
        <a href="registro.php">Registrarse</a>
        <br><br>
        </form>
       
   </nav>
   
   <?php 
    require_once 'conectar.php';
    if(isset($_POST['correo']) && isset($_POST['password']))
    {
        $correo = mysql_fix_string($conexion, $_POST['correo']);
        $password = md5($_POST['password']);

        $query = "SELECT * FROM usuario WHERE correo='$correo' AND password='$password'";

        $result = $conexion->query($query);
        if ($result->num_rows >= 1){
            header('Location: notas.php');
            
        }else
            echo "<br>";
        echo '<script> alert("CORREO O LA CONTRASEÑA INCORECTA")</script>'; 
    }

     function mysql_fix_string($coneccion, $string)
    {
        if (get_magic_quotes_gpc())
            $string = stripcslashes($string);
        return $coneccion->real_escape_string($string);
    }
        
?>
 
 <h1>SI NO ESTAS REGISTRADO PUEDES REGISTRARTE</h1>
  
   
    
</body>
</html>
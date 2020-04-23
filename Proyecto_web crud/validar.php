<?php

session_start();

          include("conexionBD.php");

          $correo = $_POST["correo"];
          $clave = $_POST["clave"];

          $sql = "Select * from usuarios where correo='$correo' and clave='$clave'";
          $resultado = mysqli_query($mysqli, $sql);
          if (!$resultado) {
            echo "Fallo al ejecutar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
          }else{  

            while($fila = mysqli_fetch_assoc($resultado)){
              $_SESSION["nombre"] = $fila["nombres"];
              $_SESSION["id"] = $fila["idUsuario"];
              $_SESSION["rol"] = $fila["id_roles"];

              if($fila["id_roles"] == 1){
                header("location:template1.php");
                exit();
              }else if($fila["id_roles"] == 2){
                header("location:template2.php");
                exit();
              }
          } 

            header("location:index.php");
          }
?>
   
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
    <div class ="container">
    <div class ="table-wrapper">
    <div class ="table-title">
    <div class="row">
    <div class="col-sm-8"><h2>Registrarse <b></b></h2></div>
    <div class="col-sm-4">
	<a href="../index.php" class="btn btn-info addnew">
    <i class="fa fa-arrow-left"></i>Regresar</a>
    </div>
    </div>
    </div>
            <div class="row">
				<form method="post">
				
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-12">
					<label>Correo:</label>
					<input type="email" name="correo" id="correo" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Clave:</label>
					<input type="text" name="clave" id="clave" class='form-control' maxlength="30" required>
				</div>
				<div class="col-md-6">
					<label>Telefono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="64" required>
				</div>
				<div class="col-md-6">
					<label>Direccion:</label>
					<input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Ciudad:</label>
					<select name='id_ciudad'>
        <?php
          include ("conexion_select.php");
          $sql = "Select * from ciudad";
          $resultado = mysqli_query($mysqli, $sql);
          if (!$resultado) {
            echo "Fallo al ejecutar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
          }else{  
            while($fila = mysqli_fetch_assoc($resultado)){
              echo "
                <option value='$fila[id]'>$fila[descripcion]</option>
              ";
            }
          }
        ?>
      </select>			
	  </div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
    <?php
				include ("database.php");
				$usuarios= new Database();
				if(isset($_POST) && !empty($_POST)){
					
					$nombres = $usuarios->sanitize($_POST['nombres']);
					$apellidos = $usuarios->sanitize($_POST['apellidos']);
					$correo = $usuarios->sanitize($_POST['correo']);
					$clave = $usuarios->sanitize($_POST['clave']);
					$telefono = $usuarios->sanitize($_POST['telefono']);
					$direccion = $usuarios->sanitize($_POST['direccion']);
					$id_ciudad = $usuarios->sanitize($_POST['id_ciudad']);
					
					$res = $usuarios->create($nombres, $apellidos, $correo, $clave, $telefono,
					$direccion,$id_ciudad);
					if($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>


</body>
</html>
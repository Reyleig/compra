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
    <div class="col-sm-8"><h2>Agregar <b>Producto</b></h2></div>
    <div class="col-sm-4">
	<a href="productoscrud.php" class="btn btn-info addnew">
    <i class="fa fa-arrow-left"></i>Regresar</a>
    </div>
    </div>
    </div>
            <div class="row">
				<form method="post">
				
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Descripcion:</label>
					<input type="text" name="descripcion" id="descripcion" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Valor unidad:</label>
					<input type="text" name="valorunitario" id="valorunitario" class='form-control' maxlength="11" required>
				</div>
				<div class="col-md-6">
					<label>Cantidad:</label>
					<input type="text" name="cantidad" id="cantidad" class='form-control' maxlength="30" required>
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
				$productos= new Database();
				if(isset($_POST) && !empty($_POST)){
					
					$nombre = $productos->sanitize($_POST['nombre']);
					$descripcion = $productos->sanitize($_POST['descripcion']);
					$valorunitario = $productos->sanitize($_POST['valorunitario']);
					$cantidad = $productos->sanitize($_POST['cantidad']);
					$res = $productos->create($nombre, $descripcion, $valorunitario, $cantidad);
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
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Usuarios</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Usuario</a>
                        <a href="../template1.php" class="btn btn-info add-new"><i class=""></i> Regresar a Tienda</a>

                    </div>
                    
                </div>
            </div>
            
    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Clave</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Codigo ciudad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
<?php 
include ('database.php');
$usuarios = new Database();
$listado=$usuarios->read();
?>   
 <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
						$id=$row->idUsuario;
						$nombres=$row->nombres;
						$apellidos=$row->apellidos;
                        $correo=$row->correo;
                        $clave=$row->clave;
                        $telefono=$row->telefono;
                        $direccion=$row->direccion;
                        $id_ciudad=$row->id_ciudad;
						
				?>
					<tr>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $apellidos;?></td>
                        <td><?php echo $correo;?></td>
                        <td><?php echo $clave;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $id_ciudad;?></td>
                        <td>
						    <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>
                    
                    
                          
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>                            
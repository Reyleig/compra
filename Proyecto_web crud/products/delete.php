<?php 
if (isset($_GET['id'])){
	include('database.php');
	$producto = new Database();
	$id=intval($_GET['id']);
	$res = $producto->delete($id);
	if($res){
		header('location: productoscrud.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>
<?php
session_start();
include "../model/database.php";

if(isset($_GET["tkn"]) && $_GET["tkn"]==$_SESSION["tkn"]){

	$id_code=$_GET["id"];
	$document = mysqli_query($con, "select * from file where code=\"$id_code\"");

	while ($rows=mysqli_fetch_array($file)) {
		$id=$rows['id'];
		$filename=$rows['filename'];
		$is_folder=$rows['is_folder'];
	}

	$url = "../storage/data/".$_SESSION["user_id"]."/";

	if($is_folder){
		$moverContenido =  mysqli_query($con, "insert into trash select * from file where folder_id =\"$id_code\"");
		$moverCarpeta =  mysqli_query($con, "insert into trash select * from file where id =\"$id_code\"");
		$delContenido = mysqli_query($con, "delete from file where folder_id = $id_code");
		$deldoc = mysqli_query($con, "delete from file where id = $id_code");
	}else{
		$moverDoc = mysqli_query($con, "insert into trash select * from file where id = $id_code");
		$delDoc = mysqli_query($con, "delete from file where id = $id_code");

	}

	if ($del) {
		// echo "Eliminado exitosamente!";
		header("location: ../myfiles.php?delsuccess");
	} else {
		// echo "Hubo un error al eliminar ";
		header("location: ../myfiles.php?delerror");
	}

}else{

	// echo "Permiso Denegado!";
	header("location: ../myfiles.php?delinvalid");
}

// header("location: ../myfiles.php");

?>
<?php
session_start();

include "../model/database.php";

if (!empty($_POST) && isset($_SESSION["user_id"])) {

	$alphabeth = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for ($i = 0; $i < 12; $i++) {
		$code .= $alphabeth[rand(0, strlen($alphabeth) - 1)];
	}

	$code = $code;
	$is_public = isset($_POST["is_public"]) ? 1 : 0;
	$user_id = $_SESSION["user_id"];
	$filename = $_POST["filename"];
	$created_at = "CURDATE()";
	$folder_code = $_POST["folder_code"];
	$file_id_folder = null;
	if (isset($folder_code) && $folder_code != "") {

		$folder = mysqli_query($con, "select * from file where code=\"$folder_code\"");

		while ($row = mysqli_fetch_array($folder)) {
			$file_id_folder = $row['id'];
		}
	}
	if (isset($file_id_folder)) {
		$sql = "insert into file (code,filename,is_folder,is_public,user_id,folder_id,created_at) ";
		$sql .= "values (\"$code\",\"$filename\",1,$is_public,$user_id,$file_id_folder,$created_at)";
	} else {
		$sql = "insert into file (code,filename,is_folder,is_public,user_id,folder_id,created_at) ";
		$sql .= "values (\"$code\",\"$filename\",1,$is_public,$user_id,NULL,$created_at)";
	}


	$query = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con), E_USER_ERROR);
	if ($query) {
		if (isset($file_id_folder)) {
			header('location: ../view/file-manager.php?folder=' . $folder_code . '');
		} else {
            header("location: ../view/file-manager.php");
		}
	} else {
		echo
		"<script>
			Snackbar.show({text: 'An error occurred while creating the folder, please try again.'});
		</script>";
	}
}

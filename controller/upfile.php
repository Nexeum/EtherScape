<?php
/*
	Contains the configuration variables to connect to the database
*/
session_start();

$id = $_SESSION['user_id'];

include "../model/database.php";

if (isset($_FILES["filename"])) {

	$alphabeth = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for ($i = 0; $i < 12; $i++) {
		$code .= $alphabeth[rand(0, strlen($alphabeth) - 1)];
	}

	$code = $code;
	$is_public = isset($_POST["is_public"]) ? 1 : 0;
	$folder = null;
	$folder_code = $_POST["folder_code"];
	$file_id_folder = null;
	if (isset($folder_code) && $folder_code != "") {

		$folder = mysqli_query($con, "select * from file where code=\"$folder_code\"");

		while ($row = mysqli_fetch_array($folder)) {
			$file_id_folder = $row['id'];
		}
	}

	$user_id = $_SESSION["user_id"];
	$description = NULL;
	$created_at = "CURDATE()";

	$file = $_FILES["filename"];
	$filename = $file["name"];

	$path = "../temp/" . $_SESSION["user_id"];
	if (!is_dir($path)) {
		mkdir($path, 0777);
	}
	$target_path = "../temp/" . $_SESSION["user_id"] . "/";
	$target_path = $target_path . basename($_FILES['filename']['name']);
	if (move_uploaded_file($_FILES['filename']['tmp_name'], $target_path)) {
		if (isset($file_id_folder)) {
			$sql = "insert into file (code,filename,description,is_folder,is_public,user_id,folder_id,created_at) ";
			$sql .= "value (\"$code\",\"$filename\",\"$description\",0,$is_public,$user_id,$file_id_folder,$created_at)";
		} else {
			$sql = "insert into file (code,filename,description,is_folder,is_public,user_id,folder_id,created_at) ";
			$sql .= "value (\"$code\",\"$filename\",\"$description\",0,$is_public,$user_id,NULL,$created_at)";
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
					Snackbar.show({text: 'An error occurred while uploading the file, please try again.'});
			</script>";
		}
	} else {
		echo
		"<script>
			Snackbar.show({text: 'A fatal error has occurred, please contact an administrator.'});
		</script>";
	}
}

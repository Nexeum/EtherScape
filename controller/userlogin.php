<?php
session_start();

/*
	Verify user data
*/
if (empty($_POST['user'])) { 
    echo  
    "<script>
        Snackbar.show({text: 'Please enter an email.'});
    </script>";
} else if (empty($_POST['password'])) {
	echo 
    "<script>
        Snackbar.show({text: 'Please enter an password.'});
    </script>";
} else if (
	!empty($_POST['user'])  &&
	!empty($_POST['password'])
) {
	/*
		Contains the configuration variables to connect to the database
	*/
    include "../model/database.php";

	/*
		Transform data and pass it to the database
	*/
	$user = mysqli_real_escape_string($con, (strip_tags($_POST["user"], ENT_QUOTES)));
	$password = sha1(md5(mysqli_real_escape_string($con, (strip_tags($_POST["password"], ENT_QUOTES)))));

	$sql = "SELECT * FROM user WHERE (email= '".$user."')  AND password = '" . $password . "';";
	$query = mysqli_query($con, $sql);
	$numrows = mysqli_num_rows($query);

	if ($row = mysqli_fetch_array($query)) {

		$_SESSION['user_id'] = $row['id'];

		print "<script>window.location.replace('../view/index.php');</script>";
	} else {
		echo 
		"<script>
			Snackbar.show({text: 'The password or username is incorrect.'});    
		</script>";
	}
}

?>
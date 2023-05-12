<?php
session_start();

/* 
	Start server-side validation 
*/
if (empty($_POST['username'])) {
    echo  
    "<script>
        Snackbar.show({text: 'Please enter an username.'});
    </script>";
} else if (empty($_POST['email'])) {
    echo  
    "<script>
        Snackbar.show({text: 'Please enter an email.'});
    </script>";
} else if (empty($_POST['password'])) {
    echo  
    "<script>
        Snackbar.show({text: 'Please enter a password.'});
    </script>";
} else if (
    !empty($_POST['username']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password'])

) {
	/* 
		Contains function that connects to database
	*/
    include "../model/database.php";

    include "../lib/avatar.php"; 

	/* 
		Receive form data and save it in variables in PHP
	*/
	$username = $_POST["username"];
	$password = sha1(md5($_POST["password"]));
    $email = $_POST["email"];
    $avatar = 1;
    $date = "NOW()";


	$sqlemail = "select * from user where (email= \"$email\")";
	$emails = mysqli_query($con, $sqlemail);
    $countemail = mysqli_num_rows($emails);

    $sqluser = "select * from user where (username= \"$username\")";
	$users = mysqli_query($con, $sqluser);
    $countuser = mysqli_num_rows($users);
    
    $letter = $username[0];
    $nameFirstChar = strtoupper($letter);
    $avatarPath = createAvatarImage($nameFirstChar);

	/* 
		Verification of data uploaded to the database
	*/

	if ($countuser > 0) {
        echo 
        "<script>
            Snackbar.show({text: 'The username already exist.'});
	    </script>";
	}elseif ($countemail > 0) {
        echo
        "<script>
            Snackbar.show({text: 'The email already exists in our database.'});
	    </script>";
    }else{

		$sql = "insert into user (username,email,password,avatar,created_at) ";
		$sql .= "value (\"$username\",\"$email\",\"$password\",\"$avatarPath\",$date)";

		$query_new_insert = mysqli_query($con, $sql);
		if ($query_new_insert) {
            echo
            "<script>
                Snackbar.show({text: 'Your account has been created successfully.'});
                setTimeout(function(){
                    window.location.href = '../view/authloginuser.php';
                }, 5000);
            </script>";
		} else {
            echo  
            "<script>
                Snackbar.show({text: 'Sorry, there was an error registering, please try again later.'});
            </script>";
		}
	}
} else {
    echo  
    "<script>
        Snackbar.show({text: 'Unknown error please contact an administrator Upoidcorp@gmail.com.'});
	</script>";
}

?>
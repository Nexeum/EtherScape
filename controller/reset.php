<?php
session_start();

/* 
	Start server-side validation 
*/
if (empty($_POST['email'])) {
    echo  
    "<script>
        Snackbar.show({text: 'Please enter an email.'});
    </scrpit>";
} else if (
    !empty($_POST['email']) 
) {
    /* 
		Contains function that connects to database
	*/
    include "../model/database.php";
    $mail = mysqli_real_escape_string($con, (strip_tags($_POST['email'], ENT_QUOTES)));

	$sqlemail = "select * from user where (email= \"$mail\")";
	$emails = mysqli_query($con, $sqlemail);
    $countemail = mysqli_num_rows($emails);

    if ($countemail > 0) {

        $alphabeth ="123456789";

        $code = "";
        for($i=0;$i<4;$i++){
            $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
        }
        $code= $code;

        $update_code = mysqli_query($con, "UPDATE user set recovery='$code' where email='$mail'");

        $para = $mail;
        $asunto = 'Codigo de restablecimiento';
    
        ob_start();
    
        include "../mail/template.php";
        $mensaje = ob_get_contents();
        ob_end_clean();
    
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   
        $cabeceras .= 'From: Soporte Nexeum <NexeumCorp@gmail.com>' . "\r\n";    
        $bolEnviar= mail($para, $asunto, $mensaje, $cabeceras);
    
        if($bolEnviar){
            print "<script>window.location.replace('authforgotuser.php?mail=".$mail."');</script>";
        }else{
            echo 
            "<script>
                Snackbar.show({text: 'There was a problem sending the mail.'});   
            </script>";
        }
	} else {
		echo 
		"<script>
			Snackbar.show({text: 'No existe en la base de datos.'});    
		</script>";
	}
}

?>
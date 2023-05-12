<?php
session_start();
$id = $_SESSION['user_id'];
include "../model/database.php";

if (isset($id)) {
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT COUNT(*) id FROM trash where user_id=$user_id";
    $result = mysqli_query($con, $sql);
    $fila = mysqli_fetch_assoc($result);

    if($fila['id'] > 0){
        $datos = mysqli_query($con, "SELECT * FROM trash where user_id=$user_id AND is_folder = 0") or trigger_error("Query Failed! SQL: $movef - Error: " . mysqli_error($con), E_USER_ERROR);
        $path = "../temp/trash/" . $_SESSION["user_id"] . "/";
    
        foreach ($datos as $data) {
            $fileid = $data['id'];
            $filename = $data['filename'];
            $is_folder = $data['is_folder'];
            $sqlfiles = mysqli_query($con, "DELETE FROM trash where id=$fileid") or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con), E_USER_ERROR);
            if (!$is_folder)
                @unlink($path . $filename);
        }
    
        $sqlfolder = mysqli_query($con, "DELETE FROM trash where user_id=$user_id") or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con), E_USER_ERROR);
    
    
        if ($sqlfiles && $sqlfolder) {
            header("location: ../view/trash.php");
        } else {
            echo
            "<script>
                    Snackbar.show({text: 'An error has occurred, try again or contact an administrator.'});
            </script>";
        }
    }else{
        echo
        "<script>
                Snackbar.show({text: 'An error has occurred, there are currently no files in the recycle garbage can.'});
        </script>";
    }
}

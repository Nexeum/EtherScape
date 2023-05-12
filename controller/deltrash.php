<?php
session_start();
include "../model/database.php";

if (isset($_GET["tkn"]) && $_GET["tkn"] == $_SESSION["tkn"]) {

    $id_code = $_GET["id"];
    $file = mysqli_query($con, "select * from file where code=\"$id_code\"");

    while ($rows = mysqli_fetch_array($file)) {
        $id = $rows['id'];
        $filename = $rows['filename'];
        $is_folder = $rows['is_folder'];
    }
    $url = "../temp/" . $_SESSION["user_id"] . "/";
    $path = "../temp/trash/" . $_SESSION["user_id"] . "/";
    if (!is_dir($path)) {
        mkdir($path, 0777);
    }
    
    if ($is_folder) {
        $datos = mysqli_query($con, "SELECT * FROM file where folder_id=$id") or trigger_error("Query Failed! SQL: $movef - Error: " . mysqli_error($con), E_USER_ERROR);

        foreach ($datos as $data) {
            $name = $data['filename'];
            $moved = rename($url . $name, $path . $name);
        }

        if ($moved) {
            $movef = mysqli_query($con, "INSERT INTO trash SELECT * FROM file where id=$id") or trigger_error("Query Failed! SQL: $movef - Error: " . mysqli_error($con), E_USER_ERROR);
            $movec = mysqli_query($con, "INSERT INTO trash SELECT * FROM file where folder_id=$id") or trigger_error("Query Failed! SQL: $movec - Error: " . mysqli_error($con), E_USER_ERROR);
            $delc = mysqli_query($con, "delete from file where folder_id=$id") or trigger_error("Query Failed! SQL: $delc - Error: " . mysqli_error($con), E_USER_ERROR);
            $delf = mysqli_query($con, "delete from file where id=$id") or trigger_error("Query Failed! SQL: $delf - Error: " . mysqli_error($con), E_USER_ERROR);


            if ($movef && $movec && $delf && $delc) {
                header("location: ../view/file-manager.php");
            } else {
                echo
                "<script>
                    Snackbar.show({text: 'An error occurred while deleting the file or folder, please try again.'});
                </script>";
            }
        } else {
            echo
            "<script>
                Snackbar.show({text: 'An internal error has occurred, please contact the administrator.'});
            </script>";
        }
    } else {

        $moved = rename($url . $filename, $path . $filename);

        if ($moved) {
            $move = mysqli_query($con, "INSERT INTO trash SELECT * FROM file where id=$id") or trigger_error("Query Failed! SQL: $move - Error: " . mysqli_error($con), E_USER_ERROR);;
            $del = mysqli_query($con, "delete from file where id=$id") or trigger_error("Query Failed! SQL: $del - Error: " . mysqli_error($con), E_USER_ERROR);;
            if ($move && $del) {
                header("location: ../view/file-manager.php");
            } else {
                echo
                "<script>
                    Snackbar.show({text: 'An error occurred while deleting the file, please try again.'});
                </script>";
            }
        } else {
            echo
            "<script>
                Snackbar.show({text: 'An internal error has occurred, please contact the administrator.'});
            </script>";
        }
    }
} else {
    echo
    "<script>
        Snackbar.show({text: 'Permission denied, please contact an administrator.'});
    </script>";
}

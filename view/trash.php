<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
include "../model/database.php";
include "../lib/image.php";
include "../lib/size.php";

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    header("location: authloginuser.php");
}
$my_user_id = $_SESSION['user_id'];
$query = mysqli_query($con, "SELECT * from user where id=$my_user_id");

while ($row = mysqli_fetch_array($query)) {
    $username = $row['username'];
    $email = $row['email'];
    $key = $row['recovery'];
    $image = $row['avatar'];
    $date = $row['created_at'];
}

$active4 = "order-tabs__link--active";
?>

<?php
$alphabeth = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$token = "";
for ($i = 0; $i < 6; $i++) {
    $token .= $alphabeth[rand(0, strlen($alphabeth) - 1)];
}
$_SESSION["tkn"] = $token;
$folder = null;
if (isset($_GET["folder"]) && $_GET["folder"] != "") {

    $id_folder = $_GET["folder"];
    $folder = mysqli_query($con, "select * from trash where code=\"$id_folder\"");

    while ($row = mysqli_fetch_array($folder)) {
        $file_id_folder = $row['id'];
        $file_folder_id = $row['folder_id'];
        $file_folder_filename = $row['filename'];
        $file_folder_code = $row['code'];
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en" data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>File Manager | BitOS </title>
    <?php include '../assets/styles.php'; ?>
</head>

<body class="sidebar-collapse">
    <?php include '../assets/symbol.php'; ?>
    <div class="sidebar-backdrop"></div>
    <div class="page-wrapper">
        <?php include '../assets/headerFile.php'; ?>
        <?php include '../assets/sidebar.php'; ?>
        <main class="page-content">
            <div class="container">

                <div class="file-manager__content">
                    <div class="container">
                        <div class="page-header">
                            <h2 class="page-header__title">My Bit</h2>
                        </div>
                        <div class="page-tools">
                            <div class="page-tools__breadcrumbs">
                                <div class="breadcrumbs">
                                    <div class="breadcrumbs__container">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="toolbox">
                            <div class="toolbox__row row gutter-bottom-xs">
                                <div class="toolbox__left col-12 col-lg">
                                    <div class="toolbox__left-row row row--xs gutter-bottom-xs">
                                        <div class="form-group form-group--inline col col-sm-auto">
                                            <div class="input-group input-group--white input-group--prepend input-group--append">
                                                <button data-dismiss="modal" data-modal="#notice" class="button button--primary header__toggle-language">
                                                    <span class="button__icon button__icon--left">
                                                        <svg class="icon-icon-trash text-white">
                                                            <use xlink:href="#icon-trash"></use>
                                                        </svg>
                                                    </span>
                                                    <span class="button__text">Empty Trash</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="toolbox__right col-12 col-lg-auto">
                                    <div class="toolbox__right-row row row--xs flex-nowrap">
                                        <div class="col col-lg-auto">
                                            <form class="toolbox__search" method="GET">
                                                <div class="input-group input-group--white input-group--prepend">
                                                    <div class="input-group__prepend">
                                                        <svg class="icon-icon-search">
                                                            <use xlink:href="#icon-search"></use>
                                                        </svg>
                                                    </div>
                                                    <input class="input" type="text" placeholder="Search Files">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-auto ml-auto">
                                            <ul class="page-tools__right-row nav" role="tablist">
                                                <li class="page-tools__right-item">
                                                    <a class="button-icon active" href="#tab-list" data-toggle="tab">
                                                        <span class="button-icon__icon">
                                                            <svg class="icon-icon-grid">
                                                                <use xlink:href="#icon-grid"></use>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="page-tools__right-item">
                                                    <a class="button-icon" href="#tab-grid" data-toggle="tab">
                                                        <span class="button-icon__icon">
                                                            <svg class="icon-icon-list">
                                                                <use xlink:href="#icon-list"></use>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modify  -->
                        <?php
                        $files = null;
                        if (mysqli_num_rows($folder) == 0) {
                            if (isset($_GET["q"]) && $_GET["q"] != "") {
                                $q = $_GET["q"];
                                $files = mysqli_query($con, "select * from trash where user_id=$my_user_id and folder_id is NULL and (filename like '%$q%' or description like '%$q%') order by is_folder desc, created_at desc");
                            } else {
                                $files = mysqli_query($con, "select * from trash where user_id=$my_user_id and folder_id is NULL order by is_folder desc, created_at desc");
                            }
                        } else {
                            // search
                            if (isset($_GET["q"]) && $_GET["q"] != "") {
                                $q = $_GET["q"];
                                $files = mysqli_query($con, "select * from trash where folder_id=$file_id_folder and  (filename like '%$q%' or description like '%$q%') order by created_at desc");
                            } else {
                                // folder/folder/file.php
                                $files = mysqli_query($con, "select * from trash where folder_id=$file_id_folder order by created_at desc");
                            }
                        }
                        ?>


                        <?php if (isset($_GET["folder"]) && $_GET["folder"] != "" && mysqli_num_rows($folder) == 0) : ?>
                            <p class="alert alert-danger">Estas intentando acceder a una carpeta que no existe!</p>
                        <?php endif; ?>



                        <?php if (isset($_GET["q"]) && $_GET["q"] != "") : ?>
                            <p class="alert alert-info">Resultado de la busqueda: <?php echo $_GET["q"]; ?></p>
                        <?php endif; ?>

                        <!-- empieza -->
                        <?php // if (mysqli_num_rows($files) > 0) : ?>

                            <div class="table-wrapper tab-content">
                                <div class="tab-pane fade" id="tab-grid">
                                    <div class="file-manager__table table-wrapper__content" data-simplebar>
                                        <table class="table table--spaces">
                                            <colgroup>
                                                <col class="colgroup-1">
                                                <col class="colgroup-2">
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                            </colgroup>
                                            <thead class="table__header">
                                                <tr class="table__header-row">
                                                    <th>
                                                        <div class="table__checkbox table__checkbox--all">
                                                            <label class="checkbox">
                                                                <input class="js-checkbox-all" type="checkbox" data-checkbox-all="files">
                                                                <span class="checkbox__marker">
                                                                    <span class="checkbox__marker-icon">
                                                                        <svg class="icon-icon-checked">
                                                                            <use xlink:href="#icon-checked"></use>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th class="table__th-sort mw-200">
                                                        <span class="align-middle">Name</span>
                                                        <span class="sort sort--down"></span>
                                                    </th>
                                                    <th class="table__th-sort">
                                                        <span class="align-middle">Size</span>
                                                        <span class="sort sort--down"></span>
                                                    </th>
                                                    <th class="table__th-sort">
                                                        <span class="align-middle">Type</span>
                                                        <span class="sort sort--down"></span>
                                                    </th>
                                                    <th class="table__th-sort">
                                                        <span class="align-middle">Date</span>
                                                        <span class="sort sort--down"></span>
                                                    </th>
                                                    <th class="table__actions"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($files as $file) : ?>
                                                    <tr class="table__row">
                                                        <td class="table__td">
                                                            <div class="table__checkbox table__checkbox--all">
                                                                <label class="checkbox">
                                                                    <input type="checkbox" data-checkbox="files">
                                                                    <span class="checkbox__marker">
                                                                        <span class="checkbox__marker-icon">
                                                                            <svg class="icon-icon-checked">
                                                                                <use xlink:href="#icon-checked"></use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="table__td">
                                                            <div class="media-item media-item--file">
                                                                <div class="media-item__icon-folder">
                                                                    <?php
                                                                    if (!$file['is_folder']) {
                                                                        $ftype = pathinfo($file['filename'], PATHINFO_EXTENSION);
                                                                        createImage($ftype);
                                                                    } else {
                                                                        echo "<svg class='icon-icon-folder text-orange'><use xlink:href='#icon-folder'></use></svg>";
                                                                    }

                                                                    ?>
                                                                </div>
                                                                <div class="media-item__right">
                                                                    <?php if ($file['is_folder']) : ?>
                                                                        <h5 class="media-item__title">
                                                                            <span class="text-clamp">
                                                                                <a href="file-manager.php?folder=<?php echo $file['code']; ?>"><?php echo $file['filename']; ?></a>
                                                                            </span>
                                                                        </h5>
                                                                    <?php else : ?>
                                                                        <h5 class="media-item__title">
                                                                            <span class="text-clamp">
                                                                                <a href="file.php?code=<?php echo $file['code']; ?>"><?php echo $file['filename']; ?></a>
                                                                            </span>
                                                                        </h5>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="table__td text-grey text-uppercase">
                                                            <?php
                                                            $url = "../temp/trash/" . $file['user_id'] . "/" . $file['filename'];

                                                            if (!$file['is_folder']) {
                                                                if (file_exists($url)) {
                                                                    $fsize = filesize($url);
                                                                    if ($file['filename'] != "") {
                                                                        if (!$file['is_folder']) {
                                                                            formatSizeUnits($fsize);
                                                                        }
                                                                    }
                                                                }
                                                            } else {
                                                                $id = $file['id'];
                                                                $sizes = mysqli_query($con, "SELECT * from trash where folder_id=$id");
                                                                $sumsize = 0;
                                                                foreach ($sizes as $size) :
                                                                    $url = "../temp/trash/" . $size['user_id'] . "/" . $size['filename'];
                                                                    if (file_exists($url)) {
                                                                        $fsize = filesize($url);
                                                                        if ($size['filename'] != "") {
                                                                            if (!$size['is_folder']) {
                                                                                $sumsize += $fsize;
                                                                            }
                                                                        }
                                                                    }
                                                                endforeach;

                                                                formatSizeUnits($sumsize);
                                                            }

                                                            ?>
                                                        </td>
                                                        <td class="table__td text-uppercase">
                                                            <?php
                                                            if (!$file['is_folder']) {
                                                                $ftype = pathinfo($file['filename'], PATHINFO_EXTENSION);
                                                                echo $ftype;
                                                            } else {
                                                                echo "Folder";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="table__td text-grey">
                                                            <?php
                                                            $time = strtotime($file['created_at']);
                                                            $createdAt = date('d-m-y', $time);
                                                            ?>
                                                            <time class="text-nowrap" datetime="2019-07-12"><?php echo $createdAt; ?></time>
                                                        </td>
                                                        <td class="table__td table__actions">
                                                            <div class="items-more">
                                                                <button class="items-more__button">
                                                                    <svg class="icon-icon-more">
                                                                        <use xlink:href="#icon-more"></use>
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown-items dropdown-items--right">
                                                                    <div class="dropdown-items__container">
                                                                        <ul class="dropdown-items__list">
                                                                            <li class="dropdown-items__item">
                                                                                <a class="dropdown-items__link">
                                                                                    <span class="dropdown-items__link-icon">
                                                                                        <svg class="icon-icon-send">
                                                                                            <use xlink:href="#icon-send"></use>
                                                                                        </svg>
                                                                                    </span>Share
                                                                                </a>
                                                                            </li>
                                                                            <li class="dropdown-items__item">
                                                                                <a class="dropdown-items__link">
                                                                                    <span class="dropdown-items__link-icon">
                                                                                        <svg class="icon-icon-trash">
                                                                                            <use xlink:href="#icon-trash"></use>
                                                                                        </svg>
                                                                                    </span>Delete
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="table__space">
                                                        <td colspan="6"></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                                $f_id = null;
                                if (isset($_GET['folder'])) {
                                    $fcode = $_GET['folder'];
                                    $f = mysqli_query($con, "select * from trash where code=\"$fcode\"");

                                    while ($row = mysqli_fetch_array($f)) {
                                        $f_id = $row['id'];
                                    }
                                    $sql = "SELECT * FROM trash WHERE user_id = $my_user_id AND is_folder = 1 AND folder_id = $f_id order by created_at desc";
                                    $fs = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con));
                                } else {
                                    $sql = "SELECT * FROM trash WHERE user_id = $my_user_id AND is_folder = 1 AND folder_id is NULL order by created_at desc";
                                    $fs = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con));
                                }

                                ?>
                                <div class="tab-pane active" id="tab-list">
                                    <?php //if (mysqli_num_rows($fs) != 0) : ?>
                                        <section class="file-manager__section">
                                            <h3 class='file-manager__section-title'>Folders</h3>
                                            <div class="file-manager__section-cards">
                                                <?php foreach ($files as $file) : ?>
                                                    <?php if ($file['is_folder']) : ?>
                                                        <div class="files-card">
                                                            <div class="files-card__content">
                                                                <div class="files-card__checkbox-wrapper">
                                                                    <label class="checkbox checkbox--circle">
                                                                        <input type="checkbox" />
                                                                        <span class="checkbox__marker">
                                                                            <span class="checkbox__marker-icon">
                                                                                <svg class="icon-icon-checked">
                                                                                    <use xlink:href="#icon-checked"></use>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="files-card__more">
                                                                    <button class="items-more__button">
                                                                        <svg class="icon-icon-dots">
                                                                            <use xlink:href="#icon-dots"></use>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dropdown-items dropdown-items--right">
                                                                        <div class="dropdown-items__container">
                                                                            <ul class="dropdown-items__list">
                                                                                <li class="dropdown-items__item">
                                                                                    <a class="dropdown-items__link">
                                                                                        <span class="dropdown-items__link-icon">
                                                                                            <svg class="icon-icon-send">
                                                                                                <use xlink:href="#icon-send"></use>
                                                                                            </svg>
                                                                                        </span>Share
                                                                                    </a>
                                                                                </li>
                                                                                <li class="dropdown-items__item">
                                                                                    <a class="dropdown-items__link">
                                                                                        <span class="dropdown-items__link-icon">
                                                                                            <svg class="icon-icon-trash">
                                                                                                <use xlink:href="#icon-trash"></use>
                                                                                            </svg>
                                                                                        </span>Delete
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="trash.php?folder=<?php echo $file['code']; ?>">
                                                                    <div class="files-card__icon">
                                                                        <svg class="icon-icon-folder">
                                                                            <use xlink:href="#icon-folder"></use>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                                <h5 class="files-card__title">
                                                                    <a href="trash.php?folder=<?php echo $file['code']; ?>"><?php echo $file['filename']; ?></a>
                                                                </h5>
                                                                <div class="files-card__bottom">
                                                                    <div class="files-card__size">
                                                                        <?php
                                                                        $id = $file['id'];
                                                                        $sizes = mysqli_query($con, "SELECT * from trash where folder_id=$id");
                                                                        $sumsize = 0;
                                                                        foreach ($sizes as $size) :
                                                                            $url = "../temp/trash/" . $size['user_id'] . "/" . $size['filename'];
                                                                            if (file_exists($url)) {
                                                                                $fsize = filesize($url);
                                                                                if ($size['filename'] != "") {
                                                                                    if (!$size['is_folder']) {
                                                                                        $sumsize += $fsize;
                                                                                    }
                                                                                }
                                                                            }
                                                                        endforeach;

                                                                        formatSizeUnits($sumsize);
                                                                        ?>
                                                                    </div>
                                                                    <div class="files-card__date">
                                                                        <?php
                                                                        $time = strtotime($file['created_at']);
                                                                        $createdAt = date('d-m-y', $time);
                                                                        ?>
                                                                        <time datetime="2019-07-12"><?php echo $createdAt; ?></time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </section>
                                    <?php //endif; ?>
                                    <?php
                                    $file_id = null;
                                    if (isset($_GET['folder'])) {
                                        $filecode = $_GET['folder'];
                                        $fileq = mysqli_query($con, "select * from trash where code=\"$filecode\"");

                                        while ($row = mysqli_fetch_array($fileq)) {
                                            $file_id = $row['id'];
                                        }
                                        $sql = "SELECT * FROM trash WHERE user_id = $my_user_id AND is_folder = 0 AND folder_id = $file_id order by created_at desc";
                                        $fsq = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con));
                                    } else {
                                        $sql = "SELECT * FROM trash WHERE user_id = $my_user_id AND is_folder = 0 AND folder_id is NULL order by created_at desc";
                                        $fsq = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($con));
                                    }

                                    ?>

                                    <?php //if (mysqli_num_rows($fsq) != 0) : ?>
                                        <section class="file-manager__section">
                                            <h3 class='file-manager__section-title'>Files</h3>
                                            <div class="file-manager__section-cards">
                                                <?php foreach ($files as $file) : ?>
                                                    <?php if (!$file['is_folder']) : ?>
                                                        <div class="files-card">
                                                            <div class="files-card__content">
                                                                <div class="files-card__checkbox-wrapper">
                                                                    <label class="checkbox checkbox--circle">
                                                                        <input type="checkbox" />
                                                                        <span class="checkbox__marker">
                                                                            <span class="checkbox__marker-icon">
                                                                                <svg class="icon-icon-checked">
                                                                                    <use xlink:href="#icon-checked"></use>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="files-card__more">
                                                                    <button class="items-more__button">
                                                                        <svg class="icon-icon-dots">
                                                                            <use xlink:href="#icon-dots"></use>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dropdown-items dropdown-items--right">
                                                                        <div class="dropdown-items__container">
                                                                            <ul class="dropdown-items__list">
                                                                                <li class="dropdown-items__item">
                                                                                    <a class="dropdown-items__link">
                                                                                        <span class="dropdown-items__link-icon">
                                                                                            <svg class="icon-icon-send">
                                                                                                <use xlink:href="#icon-send"></use>
                                                                                            </svg>
                                                                                        </span>Share
                                                                                    </a>
                                                                                </li>
                                                                                <li class="dropdown-items__item">
                                                                                    <a class="dropdown-items__link">
                                                                                        <span class="dropdown-items__link-icon">
                                                                                            <svg class="icon-icon-trash">
                                                                                                <use xlink:href="#icon-trash"></use>
                                                                                            </svg>
                                                                                        </span>Delete
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="file.php?code=<?php echo $file['code']; ?>">
                                                                    <div class="files-card__icon files-card__icon--file">
                                                                        <?php
                                                                        $url = "../temp/trash" . $file['user_id'] . "/" . $file['filename'];
                                                                        $ftype = pathinfo($file['filename'], PATHINFO_EXTENSION);

                                                                        createImage($ftype);
                                                                        ?>
                                                                    </div>
                                                                </a>

                                                                <h5 class="files-card__title">
                                                                    <a href="file.php?code=<?php echo $file['code']; ?>"><?php echo $file['filename']; ?></a>
                                                                </h5>
                                                                <div class="files-card__bottom">
                                                                    <div class="files-card__size">

                                                                        <?php
                                                                        $url = "../temp/trash/" . $file['user_id'] . "/" . $file['filename'];

                                                                        if (file_exists($url)) {
                                                                            $fsize = filesize($url);
                                                                            if ($file['filename'] != "") {
                                                                                if (!$file['is_folder']) {
                                                                                    formatSizeUnits($fsize);
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div class="files-card__date">
                                                                        <?php
                                                                        $time = strtotime($file['created_at']);
                                                                        $createdAt = date('d-m-y', $time);
                                                                        ?>
                                                                        <time datetime="2019-07-12"><?php echo $createdAt; ?></time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </section>
                                    <?php //endif; ?>
                                </div>
                            </div>
                        <?php //else : ?>
                            <div class="table-wrapper tab-content">
                                <div class="files-card">
                                    <div class="files-card__content" style="align-items:center;">
                                        <img src="../assets/img/content/main.webp" width="50%">
                                    </div>
                                </div>
                            </div>
                        <?php //endif; ?>
                    </div>
                </div>
                <div class="backdrop-sidebar-panel"></div>
            </div>
            <div id="result_delete"></div>
        </main>
    </div>

    <div class="inbox-add modal modal-compact scrollbar-thin" id="notice" data-simplebar>
        <div class="modal__overlay" data-dismiss="modal"></div>
        <div class="modal__wrap">
            <div class="modal__window">
                <div class="modal__content">
                    <button class="modal__close" data-dismiss="modal">
                        <svg class="icon-icon-cross">
                            <use xlink:href="#icon-cross"></use>
                        </svg>
                    </button>
                    <div class="modal__header">
                        <div class="modal__container">
                            <h2 class="modal__title">Delete forever?</h2>
                        </div>
                    </div>
                    <form id="confirmation" method="POST">
                        <div class="modal__body">
                            <div class="modal__container">
                                <div class="row">
                                    <div class="col-12 form-group form-group--lg mb-0">
                                        <p>
                                            All items in the trash will be deleted forever and you won't be able to restore them.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal__footer">
                            <div class="modal__container">
                                <div class="modal__footer-buttons">
                                    <div class="modal__footer-button">
                                        <button class="button button--secondary button--block" data-dismiss="modal">
                                            <span class="button__text">Cancel</span>
                                        </button>
                                    </div>
                                    <div class="modal__footer-button">
                                        <button type="submit" id="validate" class="button button--primary button--block">
                                            <span class="button__text">Delete forever</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#confirmation").submit(function(event) {
            $('#validate').attr("disabled", true);

            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../controller/delete.php",
                data: parametros,
                success: function(datos) {
                    $("#result_delete").html(datos);
                    $('#validate').attr("disabled", false);
                }
            });
            event.preventDefault();
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php include '../assets/scripts.php'; ?>
</body>

</html>
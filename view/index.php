<?php
session_start();
include "../model/database.php";

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

$count_files = mysqli_query($con, "select * from file");
$count_download = mysqli_query($con, "select sum(download) as download from file");
$count_user = mysqli_query($con, "select * from user");
?>
<!DOCTYPE html>
<html class="no-js" lang="en" data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | BitOS </title>
    <?php include '../assets/styles.php'; ?>
</head>

<body class="page-home">
    <?php include '../assets/symbol.php'; ?>
    <div class="sidebar-backdrop"></div>
    <div class="page-wrapper">
        <?php include '../assets/header.php'; ?>
        <?php include '../assets/sidebar.php'; ?>
        <main class="page-content">
            <div class="container">
                <div class="widgets">
                    <div class="widgets__row row gutter-bottom-xl">
                        <div class="col-12 col-md-6 col-xl-4 d-flex">
                            <div class="widget">
                                <div class="widget__wrapper">
                                    <div class="widget__row">
                                        <div class="widget__left">
                                            <h3 class="widget__title">Users</h3>
                                            <div class="widget__status-title text-grey">Total Users</div>
                                            <div class="widget__trade">
                                                <span class="widget__trade-count"><?php echo mysqli_num_rows($count_user); ?></span>
                                                <span class="trade-icon trade-icon--up">
                                                    <svg class="icon-icon-trade-up">
                                                        <use xlink:href="#icon-trade-up"></use>
                                                    </svg>
                                                </span>
                                                <span class="badge badge--sm badge--green"><?php echo mysqli_num_rows($count_user); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="widget__chart">
                                            <div class="widget__chart-inner">
                                                <div class="widget__chart-percentage">
                                                    <?php echo mysqli_num_rows($count_user); ?>
                                                    <small>%</small>
                                                </div>
                                                <div class="widget__chart-caption">New Users</div>
                                            </div>
                                            <div class="widget__chart-canvas js-progress-circle" data-value="<?php echo mysqli_num_rows($count_user) / 100; ?>" data-color="#22CCE2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 d-flex">
                            <div class="widget">
                                <div class="widget__wrapper">
                                    <div class="widget__row">
                                        <div class="widget__left">
                                            <h3 class="widget__title">Files and Folders</h3>
                                            <div class="widget__status-title text-grey">Total Files and Folders</div>
                                            <div class="widget__trade">
                                                <span class="widget__trade-count"><?php echo mysqli_num_rows($count_files); ?></span>
                                                <span class="trade-icon trade-icon--up">
                                                    <svg class="icon-icon-trade-up">
                                                        <use xlink:href="#icon-trade-up"></use>
                                                    </svg>
                                                </span>
                                                <span class="badge badge--sm badge--green"><?php echo mysqli_num_rows($count_files); ?>%</span>
                                            </div>
                                        </div>
                                        <div class="widget__chart">
                                            <div class="widget__chart-inner">
                                                <div class="widget__chart-percentage"><?php echo mysqli_num_rows($count_files); ?><small>%</small>
                                                </div>
                                                <div class="widget__chart-caption">New Documents</div>
                                            </div>
                                            <div class="widget__chart-canvas js-progress-circle" data-value="<?php echo mysqli_num_rows($count_files) / 100; ?>" data-color="#FDBF5E"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 d-flex">
                            <div class="widget">
                                <div class="widget__wrapper">
                                    <div class="widget__row">
                                        <div class="widget__left">
                                            <h3 class="widget__title">Downloads</h3>
                                            <div class="widget__status-title text-grey">Total downloads</div>
                                            <div class="widget__trade">
                                                <?php
                                                //compruebo si hay archivos, sino hay muestro un cero
                                                if (mysqli_num_rows($count_files) != null) {
                                                    foreach ($count_download as $count) {
                                                ?>
                                                        <span class="widget__trade-count"><?php echo $count['download']; ?></span>
                                                    <?php }
                                                } else { ?>
                                                    <span class="widget__trade-count">0</span>
                                                <?php } ?>
                                                <span class="trade-icon trade-icon--up">
                                                    <svg class="icon-icon-trade-up">
                                                        <use xlink:href="#icon-trade-up"></use>
                                                    </svg></span><span class="badge badge--sm badge--green">
                                                    <?php
                                                    if (mysqli_num_rows($count_files) != null) {
                                                        foreach ($count_download as $count) {
                                                    ?>
                                                            <?php echo $count['download']; ?>
                                                        <?php }
                                                    } else { ?> 0 <?php } ?>
                                                    %</span>
                                            </div>
                                        </div>
                                        <div class="widget__chart">
                                            <div class="widget__chart-inner">
                                                <div class="widget__chart-percentage">
                                                    <?php
                                                    if (mysqli_num_rows($count_files) != null) {
                                                        foreach ($count_download as $count) {
                                                    ?>
                                                            <?php echo $count['download']; ?>
                                                        <?php }
                                                    } else { ?> 0 <?php } ?>
                                                    <small>%</small>
                                                </div>
                                                <div class="widget__chart-caption">New Downloads</div>
                                            </div>
                                            <div class="widget__chart-canvas js-progress-circle" data-value="<?php if (mysqli_num_rows($count_files) != null) {
                                                                                                                    foreach ($count_download as $count) { ?>
                                            <?php echo $count['download'] / 100; ?> <?php }
                                                                                                                } else { ?> <?php echo 0 / 100; ?> <?php } ?>" data-color="#FF3D57"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="section__title d-none">
                        <h2>Section</h2>
                    </div>
                    <div class="row justify-content-center gutter-bottom-xl">
                        <div class="col-12 col-lg-6 col-xl-8 d-flex">
                            <div class="card pb-0">
                                <div class="card__wrapper">
                                    <div class="card__container">
                                        <div class="card__header">
                                            <div class="card__header-left">
                                                <h3 class="card__header-title">Calendar</h3>
                                            </div>
                                            <div class="card__tools-more">
                                                <button class="items-more__button">
                                                    <svg class="icon-icon-more">
                                                        <use xlink:href="#icon-more"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-items">
                                                    <div class="dropdown-items__container">
                                                        <ul class="dropdown-items__list">
                                                            <li class="dropdown-items__item">
                                                                <a class="dropdown-items__link">
                                                                    <span class="dropdown-items__link-icon">
                                                                        <svg class="icon-icon-refresh">
                                                                            <use xlink:href="#icon-refresh"></use>
                                                                        </svg>
                                                                    </span>Refresh
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-items__item">
                                                                <a class="dropdown-items__link">
                                                                    <span class="dropdown-items__link-icon">
                                                                        <svg class="icon-icon-settings">
                                                                            <use xlink:href="#icon-settings"></use>
                                                                        </svg>
                                                                    </span>Settings
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-items__item">
                                                                <a class="dropdown-items__link">
                                                                    <span class="dropdown-items__link-icon">
                                                                        <svg class="icon-icon-download">
                                                                            <use xlink:href="#icon-download"></use>
                                                                        </svg>
                                                                    </span>Download
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-items__item">
                                                                <a class="dropdown-items__link">
                                                                    <span class="dropdown-items__link-icon">
                                                                        <svg class="icon-icon-action">
                                                                            <use xlink:href="#icon-action"></use>
                                                                        </svg>
                                                                    </span>Action
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <div class="calendar-inline" id="calendarOne">
                                                <div class="js-calendar-inline"></div>
                                            </div>
                                        </div>
                                        <div class="card__footer card__footer--md">
                                            <div class="card__container">
                                                <div class="calendar-widget" data-calendar="#calendarOne">
                                                    <div class="calendar-widget__row">
                                                        <div class="calendar-widget__item calendar-widget__item--left">
                                                            <div class="calendar-widget__day">
                                                                <span class="calendar-widget__dateday">13</span>
                                                                <sup class="calendar-widget__weekday text-grey">TH</sup>
                                                            </div>
                                                            <div class="calendar-widget__month text-grey">December</div>
                                                        </div>
                                                        <div class="calendar-widget__item">
                                                            <div class="calendar-widget__status">
                                                                <span class="circle color-green"></span>
                                                                <span>Upcoming</span>
                                                            </div>
                                                            <div class="calendar-widget__order text-grey">
                                                                Order Delivery 04:30 PM
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 col-xl-4 d-flex">
                            <div class="card">
                                <div class="card__wrapper">
                                    <div class="card__container">
                                        <div class="card__header mb-0">
                                            <div class="card__header-left">
                                                <h3 class="card__header-title">Server Storage</h3>
                                            </div>
                                            <div class="card__tools-more">
                                                <button class="items-more__button">
                                                    <svg class="icon-icon-more">
                                                        <use xlink:href="#icon-more"></use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-items">
                                                    <div class="dropdown-items__container">
                                                        <ul class="dropdown-items__list">
                                                            <li class="dropdown-items__item">
                                                                <a class="dropdown-items__link">
                                                                    <span class="dropdown-items__link-icon">
                                                                        <svg class="icon-icon-refresh">
                                                                            <use xlink:href="#icon-refresh"></use>
                                                                        </svg>
                                                                    </span>Refresh
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <?php
                                            $total = round(disk_total_space("C:") / 1024 / 1024 / 1024);
                                            $free = round(disk_free_space("C:") / 1024 / 1024 / 1024);
                                            $used = round($total - $free);
                                            $totalpercentage = 100;
                                            $freepercentage = round((100 * $free) / $total);
                                            $usedpercentage = round((100 * $used) / $total);

                                            ?>
                                            <div class="card__chart">
                                                <div class="card__chart-item chart-task" id="taskPieChart" data-series="[100,<?php echo strval($usedpercentage); ?>,<?php echo strval($freepercentage); ?>]"></div>
                                            </div>
                                            <div class="card__chart-progress">
                                                <div class="card__chart-progress-item">
                                                    <div class="card__progressbar">
                                                        <div class="progressbar">
                                                            <div class="progressbar__legend">
                                                                <span class="progressbar__legend-marker" style="color: #14DF95"></span>
                                                                <span>Total storage | <?php echo $total; ?>GB</span>
                                                            </div>
                                                            <div class="progressbar__items">
                                                                <div class="progressbar__bar" style="width: 100%; background-color: #14DF95;"></div>
                                                            </div>
                                                            <div class="progressbar__append">
                                                                <span class="progressbar__percentage"><?php echo $totalpercentage; ?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__chart-progress-item">
                                                    <div class="card__progressbar">
                                                        <div class="progressbar">
                                                            <div class="progressbar__legend">
                                                                <span class="progressbar__legend-marker" style="color: #FF3D57"></span>
                                                                <span>Used storage | <?php echo $used; ?>GB</span>
                                                            </div>

                                                            <div class="progressbar__items">
                                                                <div class="progressbar__bar" style="width: <?php echo $usedpercentage; ?>%; background-color: #FF3D57;"></div>
                                                            </div>
                                                            <div class="progressbar__append">
                                                                <span class="progressbar__percentage"><?php echo $usedpercentage; ?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__chart-progress-item">
                                                    <div class="card__progressbar">
                                                        <div class="progressbar">
                                                            <div class="progressbar__legend">
                                                                <span class="progressbar__legend-marker" style="color: #22CCE2"></span>
                                                                <span>Free storage | <?php echo $free; ?>GB</span>
                                                            </div>
                                                            <div class="progressbar__items">
                                                                <div class="progressbar__bar" style="width: <?php echo $freepercentage; ?>%; background-color: #22CCE2;"></div>
                                                            </div>
                                                            <div class="progressbar__append">
                                                                <span class="progressbar__percentage"><?php echo $freepercentage; ?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <?php include '../assets/scripts.php'; ?>
</body>

</html>
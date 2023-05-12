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

?>
<!DOCTYPE html>
<html class="no-js" lang="en" data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>File Manager | BitOS</title>
    <?php include '../assets/styles.php'; ?>
</head>

<body>
    <?php include '../assets/symbol.php'; ?>
    <div class="sidebar-backdrop"></div>
    <div class="page-wrapper">
        <?php include '../assets/header.php'; ?>
        <?php include '../assets/sidebar.php'; ?>
        <main class="page-content">
            <div class="container">
                <div class="page-timeline">
                    <div class="page-timeline__section">
                        <div class="page-timeline__items">
                            <div class="timeline-item">
                                <div class="timeline-item__wrapper">
                                    <div class="timeline-item__top">
                                        <div class="timeline-item__container">
                                            <h3 class="timeline-item__title"><a href="#">Sed perspiciatis praesentium</a></h3>
                                            <div class="timeline-item__date">
                                                <svg class="icon-icon-clock">
                                                    <use xlink:href="#icon-clock"></use>
                                                </svg>
                                                <time datetime="2001-05-15 19:00">20 min ago</time>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item__container">
                                        <figure class="timeline-item__image">
                                            <a href="#">
                                                <img src="img/content/timeline/item-1.jpg" alt="#" />
                                            </a>
                                        </figure>
                                        <div class="timeline-item__description">
                                            <p>Et harum quidem rerum facilis est et expedita distinctio, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, nisi ut aliquid ex ea commodi consequatur.</p>
                                        </div>
                                        <ul class="timeline-item__stat">
                                            <li class="timeline-item__stat-item">
                                                <a class="timeline-item__stat-like" href="#">
                                                    <svg class="icon-icon-like">
                                                        <use xlink:href="#icon-like"></use>
                                                    </svg><span>80</span>
                                                </a>
                                            </li>
                                            <li class="timeline-item__stat-item">
                                                <a class="timeline-item__stat-comments" href="#">
                                                    <svg class="icon-icon-comments">
                                                        <use xlink:href="#icon-comments"></use>
                                                    </svg><span>1</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="timeline-item__bottom">
                                        <div class="timeline-item__container">
                                            <div class="timeline-item__comments">
                                                <div class="review-list">
                                                    <div class="review-list__item">
                                                        <a class="review-list__avatar color-red" href="reviews.html">
                                                            <div class="review-list__avatar-text">KG</div>
                                                            <img src="img/content/humans/item-1.jpg" alt="#" />
                                                        </a>
                                                        <div class="review-list__right">
                                                            <h5 class="review-list__name"><a href="reviews.html">Kathy Graham</a></h5><span class="review-list__time">1 min ago</span>
                                                            <div class="review-list__message">
                                                                <p class="review-list__text">Prepare us to adapt to and respect the ways others think, work, and express themselves.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-item__input-group input-group input-group--white">
                                                <div class="input-group__prepend">
                                                    <div class="position-relative">
                                                        <button class="button-icon button-icon--transparent" data-toggle="dropdown"><span class="button-icon__icon">
                                                                <svg class="icon-icon-emoji">
                                                                    <use xlink:href="#icon-emoji"></use>
                                                                </svg></span>
                                                        </button>
                                                        <div class="dropdown-emoji dropdown-menu dropdown-menu--up">
                                                            <div class="dropdown-emoji__content">
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/laughing.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/happy-2.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/crazy.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/bad.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/angry.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/happy.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/thinking.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/sad.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/pressure.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/in-love.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/nerd.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/happy-3.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/shocked.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/wink.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/sweating.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/shocked-2.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/shocked-3.svg" alt="#" />
                                                                </a>
                                                                <a class="dropdown-emoji__item" href="#" tabindex="0">
                                                                    <img class="dropdown-emoji__image" src="img/content/emoji/sad-2.svg" alt="#" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input class="input" type="text" placeholder="Write a Message..." />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php include '../assets/scripts.php'; ?>
</body>

</html>
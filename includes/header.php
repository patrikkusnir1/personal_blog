    <!-- 
        variables 
    -->
    <?php 
    $name = "Patrik";
    $full_name = "Patrik Kusnir";
    $user_logged_in = true;
    $new_messages_count = 3;
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
        -primary meta tags 
    -->

    <title><?= $name ?> - Personal Blog Website</title>
    <meta name="title" content="<?= $name ?> - Personal Blog Website">
    <meta name="description" content="This is a blog about life in Russia made by me">

    <!-- 
        -favicon 
    -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- 
        -google font link 
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- 
        -custom css link 
    -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- preload images -->
    <link rel="preload" as="image" href="assets/images/hero-banner.png">
    <link rel="preload" as="image" href="assets/images/pattern-2.svg">
    <link rel="preload" as="image" href="assets/images/pattern-3.svg">

</head>

<body id="top">


    <!-- 
        -HEADER 
    -->

    <header class="header" data-header>
        <div class="container">
            <a href="#" class="logo">
                <img src="./assets/images/patrik-high-resolution-logo-transparent.png" width="119" height="37"
                    alt="Patrik logo">
            </a>

            <nav class="navbar" data-navbar>
                <div class="navbar-top">
                    <a href="" class="logo">
                        <img src="./assets/images/patrik-high-resolution-logo-transparent.png" width="119" height="37"
                            alt="Train travel logo">
                    </a>
                    <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>
                <ul class="navbar-list">

                    <li>
                        <a href="./#home" class="navbar-link hover-1" data-nav-toggler>Home</a>
                    </li>
                    <li>
                        <a href="./#topics" class="navbar-link hover-1" data-nav-toggler>Topics</a>
                    </li>
                    <li>
                        <a href="./#featured" class="navbar-link hover-1" data-nav-toggler>Featured Post</a>
                    </li>
                    <li>
                        <a href="./#recent" class="navbar-link hover-1" data-nav-toggler>Recent Post</a>
                    </li>
                    <li>
                        <a href="#contact" class="navbar-link hover-1" data-nav-toggler>Contact</a>
                    </li>
                </ul>
                <div class="navbar-bottom">
                    <div class="profile-card">
                        <img src="./assets/images/author.jpg" alt="Patrik" class="profile-banner" width="48"
                            height="48">
                        <div>
                            <p class="card-title">Hello <?= $name ?>!</p>
                            <p class="card-subtitle">You have <?= $new_messages_count ?> new messages</p>
                        </div>
                    </div>

                    <div class="link-list">
                        <li>
                            <a class="navbar-bottom-link hover-1">Profile</a>
                        </li>
                        <li>
                            <a class="navbar-bottom-link hover-1">Articles Saved</a>
                        </li>
                        <li>
                            <a class="navbar-bottom-link hover-1">Add New Post</a>
                        </li>
                        <li>
                            <a class="navbar-bottom-link hover-1">My likes</a>
                        </li>
                        <li>
                            <a class="navbar-bottom-link hover-1">Account setting</a>
                        </li>
                        <li>
                            <a class="navbar-bottom-link hover-1">Signout</a>
                        </li>
                    </div>
                </div>
                <p class="copyright-text">
                    Copyright <?= date("Y") ?> © <?= $name ?> - Personal Blog.
                </p>
            </nav>
            <a href="" class="btn btn-primary">Subscribe</a>
            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>
        </div>
    </header>
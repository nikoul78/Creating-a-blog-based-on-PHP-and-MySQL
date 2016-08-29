<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="icon" href="<?=APP_ROOT?>/content/images/bbc-blogs.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/bbc-blogs.jpg"></a>
    <a href="<?=APP_ROOT?>/"><img src="<?=APP_ROOT?>/content/images/home.png"></a>
    <?php if ($this->isLoggedIn) : ?>
        <a href="<?=APP_ROOT?>/posts">Публикации</a>
        <a href="<?=APP_ROOT?>/posts/create">Създаване на публикация</a>
        <a href="<?=APP_ROOT?>/users">Потребители</a>
    <?php else: ?>
        <a href="<?=APP_ROOT?>/users/login">Вход</a>
        <a href="<?=APP_ROOT?>/users/register">Регистрация</a>
    <?php endif; ?>
    <?php if ($this->isLoggedIn) : ?>
        <div id="logged-in-info">
            <span>Здравей, <b><?=htmlspecialchars($_SESSION['username'])?></b></span>
            <form method="post" action="<?=APP_ROOT?>/users/logout">
                <input type="submit" value="Изход"/>
            </form>
        </div>
    <?php endif; ?>
</header>

<?php require_once('show-notify-messages.php'); ?>

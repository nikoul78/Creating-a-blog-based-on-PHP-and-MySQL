<?php $this->title = 'Вход в профила'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post">
    <div><label for="username">Потребителско име:</label></div>
    <input id="username" type="text" name="username" />
    <div><label for="password">Парола:</label></div>
    <input id="password" type="password" name="password" />
    <div><input type="submit" value="Login" />
        <a href="<?=APP_ROOT?>/users/register">[Към регистрация на нов потребител]</a></div>
</form>

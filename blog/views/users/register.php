<?php $this->title = 'Регистрация на нов потребител'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post">
    <div><label for="username">Потребителско име:</label></div>
    <input type="text" id="username" name="username">
    <div><label for="password">Парола:</label></div>
    <input type="password" id="password" name="password">
    <div><label for="password">Повторете паролата:</label></div>
    <input type="password" id="password_repeat" name="password_repeat">
    <div><label for="full_name">Име и фамилия:</label></div>
    <input type="text" id="full_name" name="full_name">
    <div>
        <input type="submit" value="Регистрация">
        <a href="<?=APP_ROOT?>/users/login">[Към Вход в профила]</a>
    </div>
</form>
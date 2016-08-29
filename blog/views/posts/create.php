<?php $this->title = 'Създай нова публикация'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Заглавие:</div>
    <input type="text" name="post_title">
    <div>Съдържание:</div>
    <textarea rows="10" name="post_content"></textarea>
    <div><input type="submit" value="Създай публикация">
        <a href="<?=APP_ROOT?>/posts">[Отказ]</a></div>
</form>

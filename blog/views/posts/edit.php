<?php $this->title = 'Редактиране на съществуваща публикация'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Заглавие:</div>
    <input type="text" name="post_title" value="<?=
    htmlspecialchars($this->post['title'])?>" />

    <div>Съдържание:</div>
    <textarea rows="10" name="post_content"><?=
        htmlspecialchars($this->post['content'])?></textarea>

    <div>Дата (yyyy-MM-dd hh:mm:ss):</div>
    <input type="text" name="post_date" value="<?=
    htmlspecialchars($this->post['date'])?>" />

    <div>Код на автора:</div>
    <input type="text" name="user_id" value="<?=
    htmlspecialchars($this->post['user_id'])?>" />

    <div>
        <input type="submit" value="Редактирай">
        <a href="<?=APP_ROOT?>/posts">[Отказ]</a>
    </div>
</form>
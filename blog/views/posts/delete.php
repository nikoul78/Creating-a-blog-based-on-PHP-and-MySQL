<?php $this->title = 'Изтрий публикация'; ?>

<h1>Сигурни ли сте, че искате да изтриете публикацията?</h1>

<form method="post">
    <div>Заглавие:</div>
    <input type="text" value="<?=htmlspecialchars($this->post['title'])?>" disabled/>
    <div>Съдържание:</div>
    <textarea rows="10" disabled><?=htmlspecialchars($this->post['content'])?></textarea>
    <div>Дата:</div>
    <input type="text" value="<?=htmlspecialchars($this->post['date'])?>" disabled/>
    <div>Уникален код на автора:</div>
    <input type="text" value="<?=htmlspecialchars($this->post['user_id'])?>" disabled/>
    <div><input type="submit" value="Изтрий" />
        <a href="<?=APP_ROOT?>/posts">[Отказ]</a></div>
</form>

<?php $this->title = $this->post['title']; ?>

<main>
    <h2><?= htmlentities($this->post['title']); ?></h2>
    <p>
        <i>Публикувано на</i>
        <?= htmlentities($this->post['date']); ?>
        <i>от</i>
        <?= htmlentities($this->post['full_name']); ?>
    </p>
    <p><?= $this->post['content']; ?></p>
</main>

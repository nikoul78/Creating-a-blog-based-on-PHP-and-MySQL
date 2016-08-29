<?php $this->title = "Потребители"; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<table>
    <tr>
        <th>Номер</th>
        <th>Потребителско име</th>
        <th>Пълно име</th>
    </tr>

    <?php foreach ($this->users as $user) : ?>
    <tr>
        <td><?=$user['id']?></td>
        <td><?=$user['username']?></td>
        <td><?=$user['full_name']?></td>
    </tr>
    <?php endforeach; ?>
</table>

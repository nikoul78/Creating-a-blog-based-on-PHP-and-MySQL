<main>
    <table>
        <tr>
            <th>Номер</th>
            <th>Заглавие</th>
            <th>Съдържание</th>
            <th>Автор</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr

    <?php foreach ($this->posts as $post) : ?>
        <tr>
            <td><?= htmlspecialchars($post['id'])?></td>
            <td><?= htmlspecialchars($post['title'])?></td>
            <td><?= cutLongText($post['content'])?></td>
            <td><?= htmlspecialchars($post['full_name'])?></td>
            <td><?= htmlspecialchars($post['date'])?></td>

            <td>
                <a href="<?=APP_ROOT?>/posts/edit/<?=$post['id']?>">[Редакция]</a>
                <a href="<?=APP_ROOT?>/posts/delete/<?=$post['id']?>">[Изтриване]</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>

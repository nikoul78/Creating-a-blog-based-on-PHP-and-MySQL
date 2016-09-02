<?php $this->title = 'В помощ на малкия бизнес'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<aside>

    <h2>Последни публикации</h2>
        <?php foreach ($this->postsSidebar as $post) : ?>

            <a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?= htmlentities($post['title']); ?>

            </a>
        <?php endforeach; ?>
    <br>
    <br>
    <h2>Виц на деня</h2>
         <a class="heading-vicovete-link" target="_blank" href="//vicove.vesti.bg/">
                <span class="heading-vicovete-text">
                    Виц на деня
                </span>
        </a>

    <div class="vicove-main">
        <p class="vicove-p">
            Един човек влиза в ресторант, където робот стои зад плота вместо барман.
            Отива човекът на бара, а роботът го пита: - Колко е Вашето IQ? - 150 - казал човекът.
            Роботът веднага му сипва 16-годишно уиски и започва разговор за глобалното затопляне,
            интерференцията на заобикалящата среда, квантовата механика, нанотехнологиите и т.н...
            <a href="http://vicove.vesti.bg/razni/1301734-Edin-chovek-vliza-v-restora" target="_blank">Виж още</a>
        </p>
    </div>



</aside>


<main>
    <?php foreach ($this->posts as $post) : ?>
        <h1><?= htmlentities($post['title']); ?></h1>
        <p>
            <i>Публикувано на</i>
            <?= htmlentities($post['date']); ?>
            <i>от</i>
            <?= htmlentities($post['full_name']); ?>
        </p>
        <p><?= $post['content']; ?></p>
    <?php endforeach; ?>

</main>
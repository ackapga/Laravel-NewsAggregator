<?php foreach ($newsList as $key => $news): ?>
    <div style="border: 1px solid green">
        <h2>
            <a href="<?= route('news.show', ['id' => $key]) ?>"> <?= $news['title'] ?> </a>
        </h2>
        <p><?= $news['author'] ?> - <?= $news['create_at']->format('d-m-Y H:i') ?></p>
        <p><?= $news['description'] ?></p>
        <p><?= $news['status'] ?></p>
    </div>
    <br>
    <hr>
    <br>
<?php endforeach; ?>

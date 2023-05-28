<?php foreach ($menus as $item): ?>
    <?php if($item['link']) : ?>
        <a href="/public/<?= $item['link'] ?>"><?= $item['title'] ?></a>
    <?php else: ?>
        <a href="/public"><?= $item['title'] ?></a>
    <?php endif; ?>
<?php endforeach; ?>

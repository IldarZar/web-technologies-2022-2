<!-- <a href="/engine/">Главная</a>
<a href="/engine/?page=catalog">Каталог</a>
<a href="/engine/?page=about">О нас</a><br> -->

<?php foreach ($menuItems as $item): ?>
  <?php if($item['link']) : ?>
    <a href="/engine/?page=<?= $item['link'] ?>"><?= $item['title'] ?></a>
  <?php else: ?>
    <a href="/engine/"><?= $item['title'] ?></a>
  <?php endif; ?>
<?php endforeach; ?>
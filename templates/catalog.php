<h2>Каталог</h2>

<div>
    <?php foreach ($catalog as $item): ?>

        <?php var_dump($item) ?>

        <div>
            <?=$item['name']?><br>
            <img class="image" src="img/<?= $item['img'] ?>" alt="" width="100" onclick="redirect('<?= $item['id'] ?>')"><br>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <?php endforeach; ?>

</div>

<script>
    function redirect(productId) {
        location.href = `/public/feedback/?productId=${productId}`;
    }
</script>


<div>

    <?php var_dump($product) ?>
    <h3>Картинка <?= $product['name'] ?></h3>
    <img class="image" src="img/<?=$product['img']?>" alt="" width="100"><br>

    <h2>Отзывы</h2>
    <form action="/public/feedback/add/" method="post">
        Оставьте отзыв: <br>
        <input type="text" name="name" placeholder="Ваше имя"><br>
        <input type="text" name="feedback" placeholder="Ваш отзыв"><br>
        <input type="text" name="productId" value="<?= $_GET['productId'] ?>"><br>
        <input type="submit" value="Добавить">
    </form>

    <?php foreach ($feedbacks as $value): ?>
        <div data-id="<?= $value['id'] ?>">
            <div class="feedback">
                <strong><?=$value['name']?></strong>: <?=$value['feedback']?>
            </div>

            <form class="edit-form hidden" action="/public/feedback/update/" method="post">
                <input type="text" name="id" class="hidden" value="<?= $value['id'] ?>">
                <input type="text" name="name" value="<?= $value['name'] ?>">
                <input type="text" name="feedback" value="<?= $value['feedback'] ?>">
                <input type="text" name="productId" class="hidden" value="<?= $value['productId'] ?>">
                <input class="edit-second" type="submit" value="Обновить данные">
                <input class="cancel-edit" type="button" value="Отменить изменения" onclick="setFormVisibility(<?= $value['id'] ?>)">
            </form>
            <button class="edit-first" onclick="setFormVisibility(<?= $value['id'] ?>)">Редактировать</button>
            <form action="/public/feedback/delete/" method="post">
                <input type="text" name="id" class="hidden" value="<?= $value['id'] ?>">
                <input type="text" name="productId" class="hidden" value="<?= $value['productId'] ?>">
                <input type="submit" value="Удалить">
            </form>

        </div>
        <br>
        <br>

    <?php endforeach;?>
</div>

<style>
    .hidden {
        display: none;
    }
</style>

<script>
    function setFormVisibility(feedbackId) {
        document.querySelector(`[data-id='${feedbackId}'] .edit-first`).classList.toggle('hidden');
        document.querySelector(`[data-id='${feedbackId}'] .edit-form`).classList.toggle('hidden');
        document.querySelector(`[data-id='${feedbackId}'] .feedback`).classList.toggle('hidden');
    }
</script>

<?php
// Задание 1.

session_start();

use \Gumlet\ImageResize;

var_dump($_FILES);

    if (!empty($_FILES)) {

        $file = $_FILES['myfile'];
        $path = 'gallery/' . $file['name'];


        // Проверка на размер файла
        if($file["size"] > 5*MB)
        {
            $_SESSION['message'] = "Ошибка. Размер файла должен быть меньше 5Мб";
            header("Location: ?page=gallery");
            die();
        }

        // Проверка на тип файла
        if ($file['type'] != 'image/jpeg' && $file['type'] != 'image/png') {
            $_SESSION['message'] = "Ошибка. Файл не является картинкой";
            header("Location: ?page=gallery");
            die();
        }



        if (move_uploaded_file($file['tmp_name'], $path)) {
            // загоняем картинку в big и small
            $image = new ImageResize($path);
            $image->resizeToWidth(500);
            $image->save('gallery/big/' . $file['name']);

            $image->resizeToWidth(200);
            $image->save('gallery/small/' . $file['name']);

            // картинка остается на одном уровне с папками big и small, поэтому ее нужно удалить
            unlink('gallery/' . $file['name']);

            $_SESSION['message'] = "Файл успешно загружен";
        } else {
            $_SESSION['message'] = "Ошибка загрузки файла";
        }

        header("Location: ?page=gallery");
        die();
    }
?>


<h2>Галлерея</h2>
<!-- Сессия нужна для вывода сообщения о результате загрузки файла. При перезагрузке страницы сообщение спадает -->
<?php if (isset($_SESSION['message'])): ?>
    <div><?= $_SESSION['message'] ?></div>
<?php unset($_SESSION["message"]); endif; ?>


<!-- Задание 3. Форма для загрузки файла -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" value="Загрузить">
</form>


<!-- Задание 1. Галерея фотографий. Через foreach выводим все фотки -->
<div>
    <?php foreach ($pictures as $item): ?>

        <?= $item['image'] ?>
        <div>
            <!-- Задание 2. При нажатии происходит редирект на детальную странциу картинки (см. файл detail.php) -->
            <img onclick="redirect('<?= $item['image'] ?>')" src="gallery/big/<?=$item['image']?>" alt="" width="100"><br>
            <hr>
        </div>
    <?php endforeach; ?>

</div>

<script>
    function redirect(imageName) {
        location.href = `/public/?page=detail&image=${imageName}`;
    }
</script>

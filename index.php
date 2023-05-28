<?php
include './config/config.php';

$url_array = explode('/', $_SERVER['REQUEST_URI']);
if ($url_array[2] == "") {
    $page = 'index';
} else {
    $page = $url_array[2];
}

$params = [];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'gallery':
        $params['title'] = 'Галерея';
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

    case 'news':
        $params['title'] = 'Новости';
        $params['news'] = getNews();
        break;

    case 'onenews':
        $id = (int)$_GET['id'];
        $news = getOneNews($id);
        $params['title'] = $news['title'] . '. Новости нашего магазина';
        $params['news'] = getOneNews($id);
        break;

    default:
        echo "404";
        die();
}

echo render($page, $params);


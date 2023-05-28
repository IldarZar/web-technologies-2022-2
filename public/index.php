<?php
include '../config/config.php';

$url_array = explode('/', $_SERVER['REQUEST_URI']);

if( $url_array[2] == "") {
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
        $params['title'] = 'Новости магазина  ' . $news['title'];
        $params['news'] = $news;
        break;

    case 'task20':
        $params['title'] = 'Task20_PHP';
        $params['directories'] = getDirectories();
        break;

    case 'pictures':
        $params['title'] = 'Галлерея';
        $params['pics'] = getGallery();
        break;

    case 'detail':
        $params['title'] = 'Картинка';
        break;
    default:
        echo "404";
        die();
}

echo render($page, $params);

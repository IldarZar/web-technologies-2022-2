<?php
include '../config/config.php';

$page = 'index';
$params = [];

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    if (isset($_GET['image'])) {
        $params = ['image' => $_GET['image']];
    }
}

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        break;

    case 'gallery':
        $params['title'] = 'Галлерея';
        $params['pictures'] = getGallery();
        break;

    case 'detail':
        $params['title'] = 'Картинка';
        break;

//    case str_starts_with($page, 'gallery'):
//        $params['title'] = 'Галлерея';
//        $params['pictures'] = getGallery();
//        break;


//
//    case (str_contains($page, '&image')):
//        $params['title'] = 'Детальная инфа';
//        $params['picture'] = substr('&image', strpos($page, '&image') + 1);
//        $page = 'details';
//        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

    default:
        echo "404";
        die();
}

echo render($page, $params);
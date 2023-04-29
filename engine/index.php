<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');
define('test', 'test');

$page = 'index';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        $params['test'] = 'Тестовая запись';
        $params['menuItems'] = getMenuItems();
        break;
    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        $params['menuItems'] = getMenuItems();
        break;
    case 'about':
        $params['title'] = 'О нас';
        $params['phone'] = '+7 495 123 23 23';
        $params['menuItems'] = getMenuItems();
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

    default:
        echo "404";
        die();
}

function getCatalog() {
    return [
        [
            'name' => 'Яблоко',
            'price' => 24,
            'image' => 'apple.png'
        ],
        [
            'name' => 'Банан',
            'price' => 1,
            'image' => 'banana.png'
        ],
        [
            'name' => 'Апельсин',
            'price' => 12,
            'image' => 'orange.png'
        ],
    ];
}

function getMenuItems() {
    return [
        [
            'title' => 'Главная',
            'link' => '',
        ],
        [
            'title' => 'Каталог',
            'link' => 'catalog',
        ],
        [
            'title' => 'О нас',
            'link' => 'about-us',
        ],
    ];
}


function renderTemplate($page, $params = []) {

//    foreach ($params as $key => $value) {
//            $$key = $value;
//        }
    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

//renderTemplate('index', $params);

echo renderTemplate(LAYOUTS_DIR . 'main', [
    'title' => $params['title'],
    'menu' => renderTemplate('menu', $params),
    'content' => renderTemplate($page, $params)
]);

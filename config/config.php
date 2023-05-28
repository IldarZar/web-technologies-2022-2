<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'webis');

include "../engine/db.php";
include "../engine/function.php";
include "../engine/catalog.php";
include "../engine/menu.php";
include "../engine/news.php";
include "../engine/pictures.php";
include "../engine/directories.php";

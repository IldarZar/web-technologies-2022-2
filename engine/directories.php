<?php

function getDirectories() {
    $assocSqlData = getAssocResult("SELECT id, name, parentId FROM directories ORDER BY parentId");
    $result = [];

    foreach ($assocSqlData as $item) {

        if (!$item['parentId']) {
            $result[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'children' => [],
            ];
        } else {
            $parentDirectory = &findParentDirectory($result, $item);
            $parentDirectory['children'][] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'children' => [],
            ];
        }
    }

    return generateMarkup($result[0]);
}

function &findParentDirectory(&$arr, &$child) {
    foreach($arr as &$parent) {
        if ($parent['id'] == $child['parentId']) {
            return $parent;
        } else {
            $tmp = &findParentDirectory($parent['children'], $child);

            if ($tmp) {
               return $tmp;
            }
        }
    }
}

function generateMarkup($data) {
    $markup = "
                <div class='list-item list-item_open' data-parent>
                    <div class='list-item__inner'>
                        <img class='list-item__arrow' src='img/chevron-down.png' alt='chevron-down' data-open>
                        <img class='list-item__folder' src='img/folder.png' alt='folder''>
                        <span class='list-item__name'>
                            {$data['name']}
                        </span>
                    </div>
            ";
    if (count($data['children']) > 0) {
        for ($i = 0; $i < count($data['children']); $i++) {
            $markup .= "<div class='list-item__items'>" . generateMarkup($data['children'][$i]) . "</div>" ;
        }
    }

    return $markup . "</div>";
}

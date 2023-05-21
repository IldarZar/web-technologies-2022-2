<?php

function getGallery() {

    $images = [];

    foreach (array_slice(scandir('gallery/small'), 2) as $image) {
        $images[] = ['image' => $image];
    }

    return $images;
}

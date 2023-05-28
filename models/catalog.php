<?php
function getCatalog() {
    return getAssocResult("SELECT id, name, img, price, description FROM products");
}

function getOneProduct($id) {
    return getAssocResult("SELECT id, name, img, price, description FROM products WHERE id = {$id}")[0];
}
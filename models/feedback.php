<?php

function getAllFeedback($productId) {
    $sql = "SELECT * FROM feedbacks WHERE productId = {$productId} ORDER BY id DESC";
    return getAssocResult($sql);
}

function addFeedback() {
    extract($_POST);
    $sql = "INSERT INTO `feedbacks` (`id`, `name`, `feedback`, `productId`) VALUES (NULL, '{$name}', '{$feedback}', '{$productId}')";

    executeSql($sql);
    header("Location: /public/feedback/?productId={$productId}");
}

function deleteFeedback() {
    extract($_POST);
    $sql = "DELETE FROM `feedbacks` WHERE id = '{$id}'";
    executeSql($sql);
    header("Location: /public/feedback/?productId={$productId}");
}

function updateFeedback() {
    extract($_POST);
    $sql = "UPDATE `feedbacks` SET `name`='{$name}',`feedback`='{$feedback}',`productId`='{$productId}' WHERE id = {$id}";
    executeSql($sql);
    header("Location: /public/feedback/?productId={$productId}");
}

function doFeedbackAction($action) {
    if($action === 'add') {
        addFeedback();
        die();
    }
    if($action === 'update') {
        updateFeedback();
        die();
    }

    if($action === 'delete') {
        deleteFeedback();
        die();
    }
}

<?php
include_once('db.php');

if (isset($_POST['checkbox'][0])) {

    foreach ($_POST['checkbox'] as $list) {
        $id = mysqli_real_escape_string($con, $list);
        mysqli_query($con, "DELETE FROM `products` WHERE `id` = {$id}");
    }
}

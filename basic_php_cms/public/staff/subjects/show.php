<?php
/**
 * Created by PhpStorm.
 * User: Wenqian
 * Date: 4/19/2018
 * Time: 4:04 PM
 */

//$id = isset($_GET['id']) ? $_GET['id'] : '1'; // PHP < 7.0

$id = $_GET['id'] ?? '1'; // PHP > 7.0

echo $id;
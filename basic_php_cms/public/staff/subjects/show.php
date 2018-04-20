<?php
/**
 * Created by PhpStorm.
 * User: Wenqian
 * Date: 4/19/2018
 * Time: 4:04 PM
 */

require_once('../../../private/initialize.php');

//$id = isset($_GET['id']) ? $_GET['id'] : '1'; // PHP < 7.0

$id = $_GET['id'] ?? '1'; // PHP > 7.0

echo $id;

?>

<a href="show.php?name=<?php echo u('Dandy Xu'); ?>">Link</a><br>
<a href="show.php?company=<?php echo u('Widgets&More'); ?>">Link</a><br>
<a href="show.php?query=<?php echo u('!#*?'); ?>">Link</a><br>

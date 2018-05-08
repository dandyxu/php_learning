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

// htmlspecialchars to prevent XSS (Cross-site Scripting)
//echo h($id);

$sql = "SELECT * FROM subjects ";
$sql .= "WHERE id='" . $id . "'";
$result = mysqli_query($db, $sql);
confirm_result_set($result);

$subject = mysqli_fetch_assoc($result);
mysqli_free_result($result);

?>

<?php $page_title = 'Show Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<!--<a href="show.php?name=--><?php //echo u('Dandy Xu'); ?><!--">Link</a><br>-->
<!--<a href="show.php?company=--><?php //echo u('Widgets&More'); ?><!--">Link</a><br>-->
<!--<a href="show.php?query=--><?php //echo u('!#*?'); ?><!--">Link</a><br>-->

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject show">

<!--        Subject ID: --><?php //echo h($id); ?>
        <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($subject['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($subject['visible'] == '1' ? 'true' : 'false'); ?></dd>
            </dl>
        </div>
    </div>
</div>

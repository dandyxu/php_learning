<?php
	if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CMS Staff - <?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" media="all" href="<?php echo url_for('css/staff.css'); ?>">

</head>

<body>
<header>
	<h1>CMS Staff Area</h1>
</header>

<navigation>
	<ul>
		<li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
	</ul>
</navigation>
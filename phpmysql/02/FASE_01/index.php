<?php
	$page = isset($_GET["page"]) ? $_GET["page"] : 'inicio';
	include('header.php');
?>
<section id="page">
<?php include($page . ".php"); ?>
</section>
<?php include('footer.php'); ?>
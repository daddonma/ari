<!DOCTYPE html>
<html>
<head>
	<title>ARI - Mitarbeiterbereicht</title>

	<!-- CSS einbinden -->
	<?php foreach($cssFiles AS $cssFile): ?>
	<link type="text/css" rel="stylesheet" href="<?= $cssFile?>" />
	<?php endforeach; ?>


</head>
<body>

	<?php require 'navi.tpl.php'; ?>
	
	<main id="content" style="margin-left:25%;padding:1px 16px;height:1000px;">

		<?php require '../templates/general/flash_message.tpl.php'; ?>
		
		<section>

            <?php require $template; ?>
        </section>

	</main>
	
</body>
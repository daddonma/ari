<!DOCTYPE html>
<html>
<head>
	<title>ARI - Mitarbeiterbereicht</title>

	<!-- JS einbinden--> 
    <?php foreach($jsFiles['preload'] AS $jsFile): ?>
        <script src="<?= $jsFile ?>" defer="defer"></script> 
    <?php endforeach; ?>

    <!-- CSS einbinden -->
    <?php foreach($cssFiles['preload'] AS $cssFile): ?>
        <link type="text/css" rel="stylesheet" href="<?= $cssFile?>" />
    <?php endforeach; ?>

    <?php foreach($cssFiles['noPreload'] AS $cssFile): ?>
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

<footer id="footer">

<script>
    const action = "<?= $action ?>";
</script>

<?php foreach($jsFiles['noPreload'] AS $jsFile): ?>
	<script src="<?= $jsFile ?>" defer="defer"></script> 
<?php endforeach; ?>

</footer>
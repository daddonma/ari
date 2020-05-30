<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

        <title>ARI</title>

        <!-- JS einbinden--> 
        <?php foreach($jsFiles['preload'] AS $jsFile): ?>
            <script src="<?= $jsFile ?>"></script> 
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

        <?php require 'general/header.tpl.php'; ?>

        <main id="content">
            
            <?php require 'general/flash_message.tpl.php'; ?>
            <?php require 'general/errors.tpl.php'; ?>

           <section>
              <?php require $template; ?>
          </section>

        </main>
    </body>

    <footer id="footer">

        <?php require 'general/footer.tpl.php'?>

        <?php foreach($jsFiles['noPreload'] AS $jsFile): ?>
            <script src="<?= $jsFile ?>" defer="defer"></script> 
        <?php endforeach; ?>
    </footer>
   
</html>

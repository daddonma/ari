<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

        <title>ARI</title>

        <!-- CSS einbinden -->
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css" />

        <!-- JavaScript einbinden-->
        <script src="<?= $basePath?>js/teaserbox.js" defer="defer"></script>
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

    <?php require 'general/footer.tpl.php'?>
</html>

<?php

namespace recette;

class Template
{

    public static function render($code, $title) : void{ ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?= $title?></title>

            <script src="<?= $GLOBALS['JS_DIR']?>main.js" ></script>
            <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>main.css">
            
            <!-- <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>mine.css"> -->
        </head>
        <body>
        <?php include $GLOBALS['PHP_DIR']."pages/header.php" ; ?>
        <div id="main-content" class = "center">

            <?php echo $code ?>

        </div> <!-- #main-content -->
        <?php include $GLOBALS['PHP_DIR']."pages/footer.php" ?>
        </body>
        </html
    <?php
    }

}